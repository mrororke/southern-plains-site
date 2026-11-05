<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventV2;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class InquiryController extends Controller
{
    /**
     * Display an individual inquiry.
     */
    public function show(Inquiry $inquiry): View
    {
        if (is_null($inquiry->read_at)) {
            $inquiry->update([
                'read_at' => now(),
            ]);
        }

        return view('admin.dashboard-v2.inquiries.show', [
            'inquiry' => $inquiry,
            'navigation' => \App\Navigation\AdminNavigation::items(),
        ]);
    }

    /**
     * Mark an inquiry as resolved.
     */
    public function resolve(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->update([
            'resolved_at' => now(),
        ]);

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry marked as resolved.');
    }

    /**
     * Reopen a resolved inquiry.
     */
    public function reopen(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->update([
            'resolved_at' => null,
        ]);

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry reopened.');
    }

    /**
     * Archive an inquiry without deleting it.
     */
    public function archive(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->update([
            'archived_at' => now(),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Inquiry archived successfully.');
    }

    /**
     * Restore an archived inquiry to the active inbox.
     */
    public function restore(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->update([
            'archived_at' => null,
        ]);

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry restored successfully.');
    }

    /**
     * Record payment and confirm a reserved registration.
     */
    public function confirmPayment(
        Request $request,
        Inquiry $inquiry
    ): RedirectResponse {
        $validated = $request->validate([
            'payment_method' => [
                'required',
                'in:paypal,venmo,apple_pay,cash_app',
            ],
        ]);

        $this->requireRegistration($inquiry);

        DB::transaction(function () use ($inquiry, $validated) {
            $event = $this->lockEvent($inquiry);

            $registration = Inquiry::query()
                ->whereKey($inquiry->getKey())
                ->lockForUpdate()
                ->firstOrFail();

            $details = $registration->details ?? [];

            if (
                ($details['registration_status'] ?? null) !== 'pending_payment'
                || ($details['payment_status'] ?? null) !== 'unpaid'
            ) {
                throw ValidationException::withMessages([
                    'registration' => 'Only unpaid registrations with an active reservation can be confirmed.',
                ]);
            }

            $dueAt = $details['payment_due_at'] ?? null;

            if (! $dueAt || Carbon::parse($dueAt)->lte(now())) {
                throw ValidationException::withMessages([
                    'registration' => 'The payment deadline has passed. A new reservation must be arranged before confirming payment.',
                ]);
            }

            if (! $this->hasCapacity($event, $registration, true)) {
                throw ValidationException::withMessages([
                    'registration' => 'There is not enough capacity to confirm this registration.',
                ]);
            }

            $details['registration_status'] = 'confirmed';
            $details['payment_status'] = 'paid';
            $details['payment_method'] = $validated['payment_method'];
            $details['paid_at'] = now()->toIso8601String();
            $details['confirmed_at'] = now()->toIso8601String();

            $registration->details = $details;
            $registration->save();
        });

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Payment recorded and registration confirmed.');
    }

    /**
     * Cancel a registration and release any reserved spots.
     */
    public function cancelRegistration(Inquiry $inquiry): RedirectResponse
    {
        $this->requireRegistration($inquiry);

        DB::transaction(function () use ($inquiry) {
            $this->lockEvent($inquiry);

            $registration = Inquiry::query()
                ->whereKey($inquiry->getKey())
                ->lockForUpdate()
                ->firstOrFail();

            $details = $registration->details ?? [];
            $status = $details['registration_status'] ?? null;

            if ($status === 'cancelled') {
                throw ValidationException::withMessages([
                    'registration' => 'This registration is already cancelled.',
                ]);
            }

            $details['registration_status'] = 'cancelled';
            $details['cancelled_at'] = now()->toIso8601String();

            // Preserve payment history. Refunds are handled manually.
            $registration->details = $details;
            $registration->save();
        });

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Registration cancelled. Any reserved spots have been released.');
    }

    /**
     * Offer an available spot to a waitlisted participant.
     */
    public function offerWaitlistSpot(Inquiry $inquiry): RedirectResponse
    {
        $this->requireRegistration($inquiry);

        DB::transaction(function () use ($inquiry) {
            $event = $this->lockEvent($inquiry);

            $registration = Inquiry::query()
                ->whereKey($inquiry->getKey())
                ->lockForUpdate()
                ->firstOrFail();

            $details = $registration->details ?? [];

            if (($details['registration_status'] ?? null) !== 'waitlisted') {
                throw ValidationException::withMessages([
                    'registration' => 'Only waitlisted registrations can receive a spot offer.',
                ]);
            }

            if (($details['payment_status'] ?? null) !== 'unpaid') {
                throw ValidationException::withMessages([
                    'registration' => 'This registration has an unexpected payment status.',
                ]);
            }

            if (! $this->hasCapacity($event, $registration)) {
                throw ValidationException::withMessages([
                    'registration' => 'There are not enough available spots for this registration.',
                ]);
            }

            $details['registration_status'] = 'pending_payment';
            $details['payment_due_at'] = now()
                ->addHours(24)
                ->toIso8601String();
            $details['waitlist_offered_at'] = now()->toIso8601String();

            $registration->details = $details;
            $registration->save();
        });

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Spot offered and reserved for 24 hours. Contact the participant with payment instructions.');
    }

    /**
     * Ensure an admin action only affects event registrations.
     */
    private function requireRegistration(Inquiry $inquiry): void
    {
        abort_unless(
            $inquiry->type === 'workshop_registration'
                && $inquiry->event_id !== null,
            404
        );
    }

    /**
     * Lock the event before modifying registrations.
     */
    private function lockEvent(Inquiry $inquiry): EventV2
    {
        return EventV2::query()
            ->whereKey($inquiry->event_id)
            ->lockForUpdate()
            ->firstOrFail();
    }

    /**
     * Check capacity, excluding the current registration.
     *
     * An existing valid hold may be confirmed without counting
     * its own spots twice.
     */
    private function hasCapacity(
        EventV2 $event,
        Inquiry $registration,
        bool $confirmingExistingHold = false
    ): bool {
        $details = $registration->details ?? [];
        $type = $details['participation_type'] ?? null;

        if (! in_array($type, ['working', 'auditor'], true)) {
            return false;
        }

        $requestedSlots = $type === 'working'
            ? count($details['dogs'] ?? [])
            : 1;

        if ($requestedSlots < 1) {
            return false;
        }

        $capacity = $type === 'working'
            ? $event->working_capacity
            : $event->auditor_capacity;

        if ($capacity === null) {
            return true;
        }

        $reserved = 0;

        $registrations = Inquiry::query()
            ->where('event_id', $event->getKey())
            ->where('type', 'workshop_registration')
            ->whereKeyNot($registration->getKey())
            ->get(['details']);

        foreach ($registrations as $existing) {
            $existingDetails = $existing->details ?? [];

            if (($existingDetails['participation_type'] ?? null) !== $type) {
                continue;
            }

            $status = $existingDetails['registration_status'] ?? null;

            if ($status === 'confirmed') {
                $reserved += $type === 'working'
                    ? count($existingDetails['dogs'] ?? [])
                    : 1;

                continue;
            }

            if ($status !== 'pending_payment') {
                continue;
            }

            $dueAt = $existingDetails['payment_due_at'] ?? null;

            if (
                ! $dueAt
                || Carbon::parse($dueAt)->lte(now())
            ) {
                continue;
            }

            $reserved += $type === 'working'
                ? count($existingDetails['dogs'] ?? [])
                : 1;
        }

        return ($reserved + $requestedSlots) <= $capacity;
    }
}

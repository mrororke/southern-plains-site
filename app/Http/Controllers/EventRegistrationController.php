<?php

namespace App\Http\Controllers;

use App\Models\EventV2;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class EventRegistrationController extends Controller
{
    public function create(EventV2 $event): View
    {
        abort_unless($this->acceptsRegistrations($event), 404);

        return view('public-v2.events.register', compact('event'));
    }

    public function store(Request $request, EventV2 $event): RedirectResponse
    {
        abort_unless($this->acceptsRegistrations($event), 404);

        // Match the silent honeypot behavior of existing inquiry forms.
        if ($request->filled('website_url')) {
            return redirect()->back()->with('success', [
                'title' => 'Registration received',
                'message' => 'Thank you for your interest in this event.',
            ]);
        }

        $rateLimitKey = 'event-registration:' . $request->ip();

        if (RateLimiter::tooManyAttempts($rateLimitKey, 3)) {
            return redirect()->back()->withErrors([
                'rate_limit' => 'Too many registrations have been submitted. Please wait 15 minutes before trying again.',
            ])->withInput($request->except('website_url'));
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'participation_type' => ['required', 'in:working,auditor'],
            'dogs' => ['required_if:participation_type,working', 'array', 'min:1', 'max:20'],
            'dogs.*.name' => ['required', 'string', 'max:255'],
            'dogs.*.age' => ['required', 'string', 'max:100'],
            'dogs.*.breed' => ['required', 'string', 'max:255'],
            'nasda_experience' => ['nullable', 'string', 'max:2000'],
            'other_sports' => ['nullable', 'string', 'max:2000'],
            'reinforcers' => ['nullable', 'string', 'max:2000'],
            'notes' => ['nullable', 'string', 'max:5000'],
            'photo_permission' => ['required', 'boolean'],
            'policy_acknowledged' => ['accepted'],
        ]);

        $isWorking = $validated['participation_type'] === 'working';
        $dogs = $isWorking ? array_values($validated['dogs']) : [];
        $requestedSlots = $isWorking ? count($dogs) : 1;

        $result = DB::transaction(function () use ($event, $validated, $dogs, $isWorking, $requestedSlots) {
            // Serialize registrations for this event to avoid overselling the last spots.
            $lockedEvent = EventV2::query()->whereKey($event->getKey())->lockForUpdate()->firstOrFail();

            if (! $this->acceptsRegistrations($lockedEvent)) {
                throw ValidationException::withMessages([
                    'registration' => 'Registration is no longer open for this event.',
                ]);
            }

            $now = now();
            $start = $this->eventStart($lockedEvent);

            // Close online registration within 48 hours of the event.
            // Last-minute registrations require direct arrangements with the club.
            if ($start->lte($now->copy()->addHours(48))) {
                throw ValidationException::withMessages([
                    'registration' => 'Online registration is closed within 48 hours of this event. Please contact Southern Plains Sport Dog Club about last-minute availability and payment.',
                ]);
            }

            $capacity = $isWorking ? $lockedEvent->working_capacity : $lockedEvent->auditor_capacity;
            $reserved = 0;

            $registrations = Inquiry::query()
                ->where('event_id', $lockedEvent->getKey())
                ->where('type', 'workshop_registration')
                ->get(['details']);

            foreach ($registrations as $registration) {
                $details = $registration->details ?? [];

                if (($details['participation_type'] ?? null) !== $validated['participation_type']) {
                    continue;
                }

                $status = $details['registration_status'] ?? null;

                if (! in_array($status, ['pending_payment', 'confirmed'], true)) {
                    continue;
                }

                // An unpaid hold stops consuming capacity as soon as its deadline passes,
                // even before the scheduled cleanup updates its stored status.
                if ($status === 'pending_payment') {
                    $dueAt = $details['payment_due_at'] ?? null;

                    if ($dueAt && Carbon::parse($dueAt)->lte($now)) {
                        continue;
                    }
                }

                $reserved += $isWorking ? count($details['dogs'] ?? []) : 1;
            }

            // Null means no capacity limit; zero means no spots available.
            $hasSpace = $capacity === null || ($reserved + $requestedSlots <= $capacity);
            $status = $hasSpace ? 'pending_payment' : 'waitlisted';

            // More than seven days: 48-hour hold. Two to seven days: 24-hour hold.
            // Never extend a payment deadline beyond the event start.
            $hoursUntilEvent = $now->diffInHours($start);
            $holdHours = $hoursUntilEvent > 168 ? 48 : 24;
            $paymentDueAt = $hasSpace ? $now->copy()->addHours($holdHours) : null;

            Inquiry::create([
                'event_id' => $lockedEvent->getKey(),
                'type' => 'workshop_registration',
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => 'Event Registration: ' . $lockedEvent->title,
                'message' => $validated['notes'] ?? null,
                'details' => [
                    'phone' => $validated['phone'],
                    'participation_type' => $validated['participation_type'],
                    'dogs' => $dogs,
                    'nasda_experience' => $validated['nasda_experience'] ?? null,
                    'other_sports' => $validated['other_sports'] ?? null,
                    'reinforcers' => $validated['reinforcers'] ?? null,
                    'notes' => $validated['notes'] ?? null,
                    'photo_permission' => (bool) $validated['photo_permission'],
                    'policy_acknowledged' => true,
                    'registration_status' => $status,
                    'payment_status' => 'unpaid',
                    'payment_due_at' => $paymentDueAt?->toIso8601String(),
                ],
            ]);

            return [
                'status' => $status,
                'payment_due_at' => $paymentDueAt,
            ];
        });

        RateLimiter::hit($rateLimitKey, 900);

        if ($result['status'] === 'waitlisted') {
            return redirect()->back()->with('success', [
                'title' => 'Added to the waitlist',
                'message' => 'The requested spots are currently full. You have been added to the waitlist. Please do not send payment unless a spot is offered.',
            ]);
        }

        return redirect()->back()->with('success', [
            'title' => 'Registration received!',
            'message' => 'Your spot is temporarily held until '
                . $result['payment_due_at']->format('F j, Y \a\t g:i A T')
                . '. Your registration is not confirmed until payment is received and recorded. Payment instructions will be provided separately.',
        ]);
    }

    private function eventStart(EventV2 $event): Carbon
    {
        $date = $event->start_date->format('Y-m-d');
        $time = $event->start_time?->format('H:i:s') ?? '00:00:00';

        return Carbon::parse($date . ' ' . $time, config('app.timezone'));
    }

    private function acceptsRegistrations(EventV2 $event): bool
    {
        return $event->isPublished()
            && $event->registration_method === 'on-site'
            && $event->registrationIsOpen()
            && (! $event->registration_deadline || ! $event->registration_deadline->lt(today()));
    }
}

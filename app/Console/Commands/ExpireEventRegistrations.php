<?php

namespace App\Console\Commands;

use App\Models\EventV2;
use App\Models\Inquiry;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExpireEventRegistrations extends Command
{
    protected $signature = 'registrations:expire';

    protected $description = 'Expire unpaid event registrations whose payment deadlines have passed.';

    public function handle(): int
    {
        $expiredCount = 0;

        $eventIds = Inquiry::query()
            ->where('type', 'workshop_registration')
            ->whereNotNull('event_id')
            ->distinct()
            ->pluck('event_id');

        foreach ($eventIds as $eventId) {
            DB::transaction(function () use ($eventId, &$expiredCount) {
                // Use the same event-level lock as the registration controller.
                // This prevents new registrations from calculating capacity
                // while expired reservations are being updated.
                $event = EventV2::query()
                    ->whereKey($eventId)
                    ->lockForUpdate()
                    ->first();

                if (! $event) {
                    return;
                }

                $registrations = Inquiry::query()
                    ->where('event_id', $eventId)
                    ->where('type', 'workshop_registration')
                    ->get();

                foreach ($registrations as $registration) {
                    $details = $registration->details ?? [];

                    if (($details['registration_status'] ?? null) !== 'pending_payment') {
                        continue;
                    }

                    if (($details['payment_status'] ?? null) === 'paid') {
                        continue;
                    }

                    $paymentDueAt = $details['payment_due_at'] ?? null;

                    if (! $paymentDueAt) {
                        continue;
                    }

                    if (Carbon::parse($paymentDueAt)->isFuture()) {
                        continue;
                    }

                    $details['registration_status'] = 'expired';
                    $details['expired_at'] = now()->toIso8601String();

                    $registration->details = $details;
                    $registration->save();

                    $expiredCount++;
                }
            });
        }

        $this->info("Expired {$expiredCount} unpaid registration(s).");

        return self::SUCCESS;
    }
}

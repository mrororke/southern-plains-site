
@extends('mail.layouts.registration')

@section('email_title', 'Registration Confirmed | Southern Plains Sport Dog Club')

@section('email_preview', 'You’re officially registered! We look forward to seeing you at your upcoming event.')

@section('content')

@php
    $details = is_array($inquiry->details)
        ? $inquiry->details
        : (json_decode($inquiry->details ?? '{}', true) ?: []);

    $participationType = $details['participation_type'] ?? 'working';
    $dogs = $details['dogs'] ?? [];

    $spots = $participationType === 'working'
        ? count($dogs)
        : 1;

    $totalAmount = isset($details['total_amount'])
        ? (float) $details['total_amount']
        : null;

    $eventDate = $event->end_date
        ? $event->start_date->format('F j') . ' – ' . $event->end_date->format('F j, Y')
        : $event->start_date->format('F j, Y');

    $location = trim(implode(', ', array_filter([
        $event->is_private_location ? null : $event->venue_name,
        $event->city,
        $event->state,
    ])));
@endphp

<h1 style="margin:0 0 20px;font-size:28px;line-height:35px;font-weight:700;color:#4F6954;">
    You're officially registered!
</h1>

<p style="margin:0 0 16px;font-size:15px;line-height:25px;color:#454B46;">
    Hi {{ $inquiry->name ?? 'there' }},
</p>

<p style="margin:0 0 28px;font-size:15px;line-height:25px;color:#454B46;">
    Great news! Your registration for <strong>{{ $event->title }}</strong>
    is confirmed. Your
    {{ $participationType === 'working' ? ($spots === 1 ? 'working spot is' : 'working spots are') : 'auditor spot is' }}
    officially reserved, and we look forward to having you join us!
</p>

{{-- Registration Summary --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#EAECE6;">
    <tr>
        <td style="padding:24px;">

            <p style="margin:0 0 18px;font-size:12px;line-height:18px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#4F6954;">
                Confirmed Registration
            </p>

            <p style="margin:0 0 6px;font-size:19px;line-height:26px;font-weight:700;color:#2E312E;">
                {{ $event->title }}
            </p>

            <p style="margin:0 0 5px;font-size:14px;line-height:22px;color:#454B46;">
                {{ $eventDate }}
            </p>

            @if ($location)
                <p style="margin:0 0 18px;font-size:14px;line-height:22px;color:#454B46;">
                    {{ $location }}
                </p>
            @endif

            <div style="border-top:1px solid #CCD3C9;margin:18px 0;"></div>

            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td style="padding:4px 0;font-size:14px;line-height:22px;color:#454B46;">
                        Registration
                    </td>
                    <td align="right" style="padding:4px 0;font-size:14px;line-height:22px;font-weight:700;color:#2E312E;">
                        {{ ucfirst($participationType) }}
                        @if ($participationType === 'working')
                            ({{ $spots }} {{ $spots === 1 ? 'dog' : 'dogs' }})
                        @endif
                    </td>
                </tr>

                @if ($totalAmount !== null)
                    <tr>
                        <td style="padding:8px 0 4px;font-size:14px;line-height:22px;color:#454B46;">
                            Registration Total
                        </td>
                        <td align="right" style="padding:8px 0 4px;font-size:18px;line-height:24px;font-weight:700;color:#2E312E;">
                            {{ $totalAmount == 0 ? 'Free' : '$' . number_format($totalAmount, 2) }}
                        </td>
                    </tr>
                @endif

                <tr>
                    <td style="padding:8px 0 4px;font-size:14px;line-height:22px;color:#454B46;">
                        Status
                    </td>
                    <td align="right" style="padding:8px 0 4px;font-size:14px;line-height:22px;font-weight:700;color:#4F6954;">
                        Confirmed
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

{{-- What's Next --}}
<h2 style="margin:32px 0 12px;font-size:21px;line-height:28px;font-weight:700;color:#4F6954;">
    What Happens Next?
</h2>

<p style="margin:0 0 16px;font-size:15px;line-height:25px;color:#454B46;">
    You're all set! We'll share any additional event details, including arrival instructions and what to bring, as the event approaches.
</p>

<p style="margin:0 0 24px;font-size:15px;line-height:25px;color:#454B46;">
    In the meantime, please keep this confirmation for your records.
</p>

{{-- Helpful Reminder --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-left:4px solid #4F6954;background-color:#EAECE6;">
    <tr>
        <td style="padding:20px 22px;">

            <p style="margin:0 0 9px;font-size:16px;line-height:23px;font-weight:700;color:#4F6954;">
                A Quick Reminder
            </p>

            <p style="margin:0;font-size:14px;line-height:23px;color:#454B46;">
                If your plans change or you have questions before the event, please reply to this email and let us know.
            </p>

        </td>
    </tr>
</table>

<p style="margin:28px 0 0;font-size:15px;line-height:25px;color:#454B46;">
    We can't wait to see you there. Let's play!
</p>

@endsection

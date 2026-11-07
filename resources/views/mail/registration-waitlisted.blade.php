
@extends('mail.layouts.registration')

@section('email_title', 'You’re on the Waitlist | Southern Plains Sport Dog Club')

@section('email_preview', 'You’re on the waitlist! We’ll be in touch if a spot becomes available.')

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
    You're on the waitlist!
</h1>

<p style="margin:0 0 16px;font-size:15px;line-height:25px;color:#454B46;">
    Hi {{ $inquiry->name ?? 'there' }},
</p>

<p style="margin:0 0 28px;font-size:15px;line-height:25px;color:#454B46;">
    Thanks for your interest in <strong>{{ $event->title }}</strong>!
    The requested spots are currently full, but we've added your registration to the waitlist.
    We'll be in touch if space becomes available.
</p>

{{-- Waitlist Summary --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#EAECE6;">
    <tr>
        <td style="padding:24px;">

            <p style="margin:0 0 18px;font-size:12px;line-height:18px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#4F6954;">
                Waitlist Details
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

                <tr>
                    <td style="padding:8px 0 4px;font-size:14px;line-height:22px;color:#454B46;">
                        Status
                    </td>
                    <td align="right" style="padding:8px 0 4px;font-size:14px;line-height:22px;font-weight:700;color:#4F6954;">
                        Waitlisted
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

{{-- What Happens Next --}}
<h2 style="margin:32px 0 12px;font-size:21px;line-height:28px;font-weight:700;color:#4F6954;">
    What Happens Next?
</h2>

<p style="margin:0 0 16px;font-size:15px;line-height:25px;color:#454B46;">
    If a spot becomes available, we'll contact you with the details and instructions for securing your place.
</p>

<p style="margin:0 0 24px;font-size:15px;line-height:25px;color:#454B46;">
    Being on the waitlist doesn't guarantee a spot, but we'll do our best to accommodate you.
</p>

{{-- Payment Reminder --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-left:4px solid #4F6954;background-color:#EAECE6;">
    <tr>
        <td style="padding:20px 22px;">

            <p style="margin:0 0 9px;font-size:16px;line-height:23px;font-weight:700;color:#4F6954;">
                Please Don't Send Payment Yet
            </p>

            <p style="margin:0;font-size:14px;line-height:23px;color:#454B46;">
                No payment is due while you're on the waitlist. If we're able to offer you a spot, we'll send a separate email with payment details and a deadline.
            </p>

        </td>
    </tr>
</table>

<p style="margin:28px 0 0;font-size:15px;line-height:25px;color:#454B46;">
    Thanks for your patience. We hope to see you and your dog soon!
</p>

@endsection

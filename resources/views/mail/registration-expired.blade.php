
@extends('mail.layouts.registration')

@section('email_title', 'Registration Expired | Southern Plains Sport Dog Club')

@section('email_preview', 'Your event registration has expired because the payment deadline has passed.')

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

    $paymentDueAt = !empty($details['payment_due_at'])
        ? \Illuminate\Support\Carbon::parse($details['payment_due_at'])
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
    Your registration has expired
</h1>

<p style="margin:0 0 16px;font-size:15px;line-height:25px;color:#454B46;">
    Hi {{ $inquiry->name ?? 'there' }},
</p>

<p style="margin:0 0 28px;font-size:15px;line-height:25px;color:#454B46;">
    We're reaching out to let you know that your registration for
    <strong>{{ $event->title }}</strong> has expired because we didn't have
    a payment recorded by the deadline. Your spot is no longer reserved.
</p>

{{-- Expired Registration Summary --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#EAECE6;">
    <tr>
        <td style="padding:24px;">

            <p style="margin:0 0 18px;font-size:12px;line-height:18px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#4F6954;">
                Expired Registration
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

                @if ($paymentDueAt)
                    <tr>
                        <td style="padding:8px 0 4px;font-size:14px;line-height:22px;color:#454B46;">
                            Payment Deadline
                        </td>
                        <td align="right" style="padding:8px 0 4px;font-size:14px;line-height:22px;font-weight:700;color:#2E312E;">
                            {{ $paymentDueAt->format('F j, Y \a\t g:i A') }}
                        </td>
                    </tr>
                @endif

                <tr>
                    <td style="padding:8px 0 4px;font-size:14px;line-height:22px;color:#454B46;">
                        Status
                    </td>
                    <td align="right" style="padding:8px 0 4px;font-size:14px;line-height:22px;font-weight:700;color:#4F6954;">
                        Expired
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

{{-- What This Means --}}
<h2 style="margin:32px 0 12px;font-size:21px;line-height:28px;font-weight:700;color:#4F6954;">
    What This Means
</h2>

<p style="margin:0 0 16px;font-size:15px;line-height:25px;color:#454B46;">
    Your registration is no longer active, and the spot may be offered to another participant.
</p>

<p style="margin:0 0 24px;font-size:15px;line-height:25px;color:#454B46;">
    If you're still interested in attending, please reply to this email.
    We can check whether space is still available and let you know what options you have.
</p>

{{-- Payment Reminder --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-left:4px solid #4F6954;background-color:#EAECE6;">
    <tr>
        <td style="padding:20px 22px;">

            <p style="margin:0 0 9px;font-size:16px;line-height:23px;font-weight:700;color:#4F6954;">
                Already Sent Payment?
            </p>

            <p style="margin:0;font-size:14px;line-height:23px;color:#454B46;">
                If you've already submitted payment, please reply to this email
                with the payment details so we can look into it. Payments may
                occasionally take time to be recorded.
            </p>

        </td>
    </tr>
</table>

<p style="margin:28px 0 0;font-size:15px;line-height:25px;color:#454B46;">
    We hope we'll have another opportunity to see you and your dog. Let's play!
</p>

@endsection

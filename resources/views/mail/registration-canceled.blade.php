
@extends('mail.layouts.registration')

@section('email_title', 'Registration Canceled | Southern Plains Sport Dog Club')

@section('email_preview', 'Your event registration has been canceled. Here are the details for your records.')

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
    Registration Canceled
</h1>

<p style="margin:0 0 16px;font-size:15px;line-height:25px;color:#454B46;">
    Hi {{ $inquiry->name ?? 'there' }},
</p>

<p style="margin:0 0 28px;font-size:15px;line-height:25px;color:#454B46;">
    This email confirms that your registration for
    <strong>{{ $event->title }}</strong> has been canceled.
    Your reserved spot has been released, and no further action is needed regarding this registration.
</p>

{{-- Registration Summary --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#EAECE6;">
    <tr>
        <td style="padding:24px;">

            <p style="margin:0 0 18px;font-size:12px;line-height:18px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#4F6954;">
                Canceled Registration
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
                        Canceled
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
    Your registration is no longer active, and the spot is available for another participant.
</p>

<p style="margin:0 0 24px;font-size:15px;line-height:25px;color:#454B46;">
    If you've already submitted payment or have questions about the cancellation, please reply to this email so we can review your registration.
</p>

{{-- Helpful Reminder --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-left:4px solid #4F6954;background-color:#EAECE6;">
    <tr>
        <td style="padding:20px 22px;">

            <p style="margin:0 0 9px;font-size:16px;line-height:23px;font-weight:700;color:#4F6954;">
                Have Questions?
            </p>

            <p style="margin:0;font-size:14px;line-height:23px;color:#454B46;">
                If this cancellation was unexpected or you need assistance, simply reply to this email and we'll be happy to help.
            </p>

        </td>
    </tr>
</table>

<p style="margin:28px 0 0;font-size:15px;line-height:25px;color:#454B46;">
    We hope to see you at another Southern Plains Sport Dog Club event soon.
</p>

@endsection

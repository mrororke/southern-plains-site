
@extends('mail.layouts.registration')

@section('email_title', 'Registration Received | Southern Plains Sport Dog Club')

@section('email_preview', 'We received your registration! Here are your payment details and next steps.')

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

    $paymentDueAt = !empty($details['payment_due_at'])
        ? \Illuminate\Support\Carbon::parse($details['payment_due_at'])
        : (!empty($inquiry->payment_due_at)
            ? \Illuminate\Support\Carbon::parse($inquiry->payment_due_at)
            : null);

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
    We received your registration!
</h1>

<p style="margin:0 0 16px;font-size:15px;line-height:25px;color:#454B46;">
    Hi {{ $inquiry->name ?? 'there' }},
</p>

<p style="margin:0 0 28px;font-size:15px;line-height:25px;color:#454B46;">
    Thanks for registering with Southern Plains Sport Dog Club! We've received your registration for
    <strong>{{ $event->title }}</strong>. Your spot is being held while we wait for payment.
</p>

{{-- Registration Summary --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#EAECE6;">
    <tr>
        <td style="padding:24px;">

            <p style="margin:0 0 18px;font-size:12px;line-height:18px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#4F6954;">
                Registration Summary
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
                            Total Due
                        </td>
                        <td align="right" style="padding:8px 0 4px;font-size:18px;line-height:24px;font-weight:700;color:#2E312E;">
                            ${{ number_format($totalAmount, 2) }}
                        </td>
                    </tr>
                @endif

                @if ($paymentDueAt)
                    <tr>
                        <td style="padding:8px 0 4px;font-size:14px;line-height:22px;color:#454B46;">
                            Payment Deadline
                        </td>
                        <td align="right" style="padding:8px 0 4px;font-size:14px;line-height:22px;font-weight:700;color:#4F6954;">
                            {{ $paymentDueAt->format('F j, Y \a\t g:i A') }}
                        </td>
                    </tr>
                @endif
            </table>

        </td>
    </tr>
</table>

{{-- Payment Instructions --}}
<h2 style="margin:32px 0 12px;font-size:21px;line-height:28px;font-weight:700;color:#4F6954;">
    Complete Your Registration
</h2>

<p style="margin:0 0 16px;font-size:15px;line-height:25px;color:#454B46;">
    @if ($paymentDueAt)
        Please send your registration total by
        <strong>{{ $paymentDueAt->format('F j, Y \a\t g:i A') }}</strong>
        to secure your place.
    @else
        Please send your registration total to secure your place.
    @endif
</p>

<p style="margin:0 0 18px;font-size:15px;line-height:25px;color:#454B46;">
    Choose your preferred payment method below.
</p>

{{-- Three-Column Payment Buttons --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
        <td width="33.33%" align="center" style="padding:0 5px 0 0;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td align="center" bgcolor="#4F6954" style="border-radius:3px;">
                        <a href="https://paypal.me/melanieororke1"
                           style="display:block;padding:12px 5px;color:#FFFFFF;text-decoration:none;font-size:13px;line-height:18px;font-weight:700;">
                            PayPal
                        </a>
                    </td>
                </tr>
            </table>
        </td>

        <td width="33.33%" align="center" style="padding:0 5px;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td align="center" bgcolor="#4F6954" style="border-radius:3px;">
                        <a href="https://www.venmo.com/u/Melanie-ORorke"
                           style="display:block;padding:12px 5px;color:#FFFFFF;text-decoration:none;font-size:13px;line-height:18px;font-weight:700;">
                            Venmo
                        </a>
                    </td>
                </tr>
            </table>
        </td>

        <td width="33.33%" align="center" style="padding:0 0 0 5px;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td align="center" bgcolor="#4F6954" style="border-radius:3px;">
                        <a href="https://cash.app/$southernplainssdc"
                           style="display:block;padding:12px 5px;color:#FFFFFF;text-decoration:none;font-size:13px;line-height:18px;font-weight:700;">
                            Cash App
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<p style="margin:18px 0 0;font-size:13px;line-height:22px;color:#626A63;">
    Please include your name and the event title in the payment note so we can match your payment to your registration.
</p>

<p style="margin:12px 0 0;font-size:13px;line-height:22px;color:#626A63;">
    <strong>PayPal:</strong> Please use Friends &amp; Family, or add enough to cover the Goods &amp; Services fees so we receive the full registration amount.
</p>

{{-- What's Next --}}
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top:30px;border-left:4px solid #4F6954;background-color:#EAECE6;">
    <tr>
        <td style="padding:20px 22px;">

            <p style="margin:0 0 9px;font-size:16px;line-height:23px;font-weight:700;color:#4F6954;">
                What's Next?
            </p>

            <p style="margin:0;font-size:14px;line-height:23px;color:#454B46;">
                Once we've received and recorded your payment, we'll send you a confirmation email with your registration details. Keep an eye on your inbox!
            </p>

        </td>
    </tr>
</table>

<p style="margin:28px 0 0;font-size:15px;line-height:25px;color:#454B46;">
    We look forward to seeing you and your dog!
</p>

@endsection

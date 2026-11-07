
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

    {{-- Heading --}}
    <h1 style="margin:0;font-size:30px;line-height:38px;font-weight:700;color:#4F6954;">
        Registration Received!
    </h1>

    <p style="margin:22px 0 0;font-size:15px;line-height:25px;color:#2E312E;">
        Hi {{ $inquiry->name }},
    </p>

    <p style="margin:14px 0 0;font-size:15px;line-height:25px;color:#505851;">
        Thanks for registering with Southern Plains Sport Dog Club! We've received your registration and reserved your spot{{ $spots === 1 ? '' : 's' }} while payment is pending.
    </p>

    {{-- Registration Summary --}}
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top:30px;background-color:#EDEBE5;">
        <tr>
            <td style="padding:24px;">

                <p style="margin:0 0 18px;font-size:12px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#4F6954;">
                    Your Registration
                </p>

                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                        <td width="50%" valign="top" style="padding-right:14px;border-right:1px solid #D1D0C9;">

                            <p style="margin:0;font-size:12px;line-height:18px;color:#656B64;">
                                Event
                            </p>
                            <p style="margin:5px 0 16px;font-size:15px;line-height:21px;font-weight:700;color:#2E312E;">
                                {{ $event->title }}
                            </p>

                            <p style="margin:0;font-size:12px;line-height:18px;color:#656B64;">
                                Date
                            </p>
                            <p style="margin:5px 0 16px;font-size:14px;line-height:21px;color:#2E312E;">
                                {{ $eventDate }}
                            </p>

                            @if ($location)
                                <p style="margin:0;font-size:12px;line-height:18px;color:#656B64;">
                                    Location
                                </p>
                                <p style="margin:5px 0 0;font-size:14px;line-height:21px;color:#2E312E;">
                                    {{ $location }}
                                </p>
                            @endif

                        </td>

                        <td width="50%" valign="top" style="padding-left:18px;">

                            <p style="margin:0;font-size:12px;line-height:18px;color:#656B64;">
                                Registration
                            </p>
                            <p style="margin:5px 0 16px;font-size:14px;line-height:21px;font-weight:700;color:#2E312E;">
                                @if ($participationType === 'working')
                                    {{ $spots }} Working {{ $spots === 1 ? 'Spot' : 'Spots' }}
                                @else
                                    1 Auditor
                                @endif
                            </p>

                            @if ($totalAmount !== null)
                                <p style="margin:0;font-size:12px;line-height:18px;color:#656B64;">
                                    Total Due
                                </p>
                                <p style="margin:5px 0 16px;font-size:22px;line-height:28px;font-weight:700;color:#4F6954;">
                                    ${{ number_format($totalAmount, 2) }}
                                </p>
                            @endif

                            @if ($paymentDueAt)
                                <p style="margin:0;font-size:12px;line-height:18px;color:#656B64;">
                                    Payment Deadline
                                </p>
                                <p style="margin:5px 0 0;font-size:14px;line-height:21px;font-weight:700;color:#2E312E;">
                                    {{ $paymentDueAt->format('F j, Y') }}<br>
                                    {{ $paymentDueAt->format('g:i A') }}
                                </p>
                            @endif

                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

    {{-- Payment Instructions --}}
    @if ($totalAmount !== null && $totalAmount > 0)

        <h2 style="margin:34px 0 0;font-size:21px;line-height:28px;font-weight:700;color:#2E312E;">
            Complete Your Payment
        </h2>

        <p style="margin:12px 0 0;font-size:14px;line-height:23px;color:#505851;">
            Your spot is reserved while we wait for payment. Please send your registration total before the deadline above to secure your place.
        </p>

        <p style="margin:18px 0 10px;font-size:13px;line-height:21px;font-weight:700;color:#2E312E;">
            Choose your preferred payment method:
        </p>

        <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td style="padding:7px 0;">
                    <a href="https://paypal.me/melanieororke1" style="display:block;padding:13px 18px;background-color:#4F6954;color:#FFFFFF;text-decoration:none;text-align:center;font-size:14px;font-weight:700;">
                        Pay with PayPal
                    </a>
                </td>
            </tr>
            <tr>
                <td style="padding:7px 0;">
                    <a href="https://www.venmo.com/u/Melanie-ORorke" style="display:block;padding:13px 18px;background-color:#4F6954;color:#FFFFFF;text-decoration:none;text-align:center;font-size:14px;font-weight:700;">
                        Pay with Venmo
                    </a>
                </td>
            </tr>
            <tr>
                <td style="padding:7px 0;">
                    <a href="https://cash.app/$southernplainssdc" style="display:block;padding:13px 18px;background-color:#4F6954;color:#FFFFFF;text-decoration:none;text-align:center;font-size:14px;font-weight:700;">
                        Pay with Cash App
                    </a>
                </td>
            </tr>
        </table>

        <p style="margin:18px 0 0;font-size:13px;line-height:22px;color:#505851;">
            Please include your name and the event title in the payment note so we can match your payment to your registration.
        </p>

        <p style="margin:12px 0 0;font-size:13px;line-height:22px;color:#505851;">
            <strong>PayPal:</strong> Please use Friends &amp; Family. If you choose Goods &amp; Services, add enough to cover the transaction fees so we receive the full registration amount.
        </p>

    @endif

    {{-- Next Steps --}}
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top:32px;background-color:#E5E9DF;">
        <tr>
            <td style="padding:24px;">

                <h2 style="margin:0;font-size:19px;line-height:26px;font-weight:700;color:#4F6954;">
                    What's Next?
                </h2>

                <p style="margin:12px 0 0;font-size:14px;line-height:23px;color:#505851;">
                    Once we've received and recorded your payment, we'll send a confirmation email. Your registration isn't fully confirmed until then.
                </p>

                <p style="margin:12px 0 0;font-size:14px;line-height:23px;color:#505851;">
                    In the meantime, keep an eye on your inbox for updates about the event. We're looking forward to seeing you and your dog!
                </p>

            </td>
        </tr>
    </table>

    <p style="margin:30px 0 0;font-size:14px;line-height:23px;color:#505851;">
        See you soon,<br>
        <strong>Southern Plains Sport Dog Club</strong>
    </p>

@endsection

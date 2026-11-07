
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light">
    <title>@yield('email_title', 'Southern Plains Sport Dog Club')</title>
</head>

@php
    $logoUrl = asset('images/southern-plains-logo.png');

    $featuredImageUrl = $event->featured_image_path
        ? url(\Illuminate\Support\Facades\Storage::disk('public')->url($event->featured_image_path))
        : null;
@endphp

<body style="margin:0;padding:0;background-color:#EDEBE5;font-family:Arial,Helvetica,sans-serif;color:#2E312E;">

    {{-- Email Preview Text --}}
    <div style="display:none;font-size:1px;color:#EDEBE5;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden;">
        @yield('email_preview', 'An update about your Southern Plains Sport Dog Club registration.')
    </div>

    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#EDEBE5;">
        <tr>
            <td align="center" style="padding:32px 16px;">

                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="width:100%;max-width:600px;background-color:#F7F5F0;">

                    {{-- Full-Width Featured Image Header --}}
                    <tr>
                        <td
                            valign="top"
                            height="230"
                            @if ($featuredImageUrl)
                                background="{{ $featuredImageUrl }}"
                            @endif
                            style="
                                height:230px;
                                background-color:#D8DDE0;
                                @if ($featuredImageUrl)
                                    background-image:url('{{ $featuredImageUrl }}');
                                @endif
                                background-position:center center;
                                background-size:cover;
                                background-repeat:no-repeat;
                            "
                        >

                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tr>
                                    <td style="padding:24px;">

                                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="background-color:#F7F5F0;">
                                            <tr>
                                                <td style="padding:15px 20px;">

                                                    <img
                                                        src="{{ $logoUrl }}"
                                                        alt="Southern Plains Sport Dog Club"
                                                        width="125"
                                                        style="display:block;width:125px;max-width:100%;height:auto;border:0;"
                                                    >

                                                    <p style="margin:10px 0 0;font-size:10px;line-height:15px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#4F6954;text-align:center;">
                                                        Play. Train. Grow.
                                                    </p>

                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- Prairie Green Divider --}}
                    <tr>
                        <td style="height:4px;background-color:#4F6954;font-size:0;line-height:0;">
                            &nbsp;
                        </td>
                    </tr>

                    {{-- Email Content --}}
                    <tr>
                        <td style="padding:40px 32px 44px;">

                            @yield('content')

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding:32px;background-color:#2E312E;">

                            <p style="margin:0;font-size:15px;line-height:22px;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#F7F5F0;">
                                Southern Plains Sport Dog Club
                            </p>

                            <p style="margin:8px 0 0;font-size:11px;line-height:18px;letter-spacing:1.5px;text-transform:uppercase;color:#C5D0C5;">
                                Play. Train. Grow.
                            </p>

                            <div style="margin-top:24px;border-top:1px solid #4F6954;padding-top:22px;">

                                <p style="margin:0;font-size:13px;line-height:21px;color:#E4E6E1;">
                                    Questions about your registration? Simply reply to this email.
                                </p>

                                <p style="margin:14px 0 0;font-size:12px;line-height:20px;color:#D8DDE0;">
                                    You're receiving this email because you registered for an event with Southern Plains Sport Dog Club.
                                </p>

                                <p style="margin:18px 0 0;font-size:12px;line-height:20px;color:#D8DDE0;">

                                    <a href="https://southernplains.dog" style="color:#D8DDE0;text-decoration:underline;">
                                        southernplains.dog
                                    </a>

                                    <span style="padding:0 9px;color:#8E9A8E;">|</span>

                                    <a href="https://southernplains.dog/legal/privacy" style="color:#D8DDE0;text-decoration:underline;">
                                        Privacy Policy
                                    </a>

                                </p>

                                <p style="margin:18px 0 0;font-size:11px;line-height:18px;color:#BFC7BF;">
                                    &copy; {{ date('Y') }} Southern Plains Sport Dog Club. All rights reserved.
                                </p>

                            </div>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>

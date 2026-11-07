
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

                    {{-- Header --}}
                    <tr>
                        <td style="padding:28px 32px;background-color:#F7F5F0;">

                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tr>
                                    <td valign="middle" style="padding-right:16px;">

                                        <img
                                            src="{{ $logoUrl }}"
                                            alt="Southern Plains Sport Dog Club"
                                            width="155"
                                            style="display:block;width:155px;max-width:100%;height:auto;border:0;"
                                        >

                                        <p style="margin:12px 0 0;font-size:10px;line-height:15px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#4F6954;">
                                            Play. Train. Grow.
                                        </p>

                                    </td>

                                    @if ($featuredImageUrl)
                                        <td width="190" valign="middle" align="right" style="width:190px;">

                                            <img
                                                src="{{ $featuredImageUrl }}"
                                                alt="{{ $event->featured_image_alt ?? $event->title }}"
                                                width="190"
                                                style="display:block;width:190px;max-width:100%;height:auto;border:0;"
                                            >

                                        </td>
                                    @endif
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

                            <p style="margin:22px 0 0;font-size:12px;line-height:20px;color:#D8DDE0;">
                                Questions about your registration? Simply reply to this email.
                            </p>

                            <p style="margin:14px 0 0;font-size:12px;line-height:20px;">
                                <a href="https://southernplains.dog" style="color:#D8DDE0;text-decoration:underline;">
                                    southernplains.dog
                                </a>
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Intro to NASDA Workshop Request</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .header {
            color: #9B5C3A;
        }

        .message-details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            white-space: pre-wrap;
        }

        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2 class="header">New Intro to NASDA Workshop Request</h2>

        <p>
            <strong>From:</strong>
            {{ $inquiry->name }}
        </p>

        <p>
            <strong>Email:</strong>
            <a href="mailto:{{ $inquiry->email }}">
                {{ $inquiry->email }}
            </a>
        </p>

        @if (!empty($inquiry->details['organization']))
            <p>
                <strong>Club or Organization:</strong>
                {{ $inquiry->details['organization'] }}
            </p>
        @endif

        <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">

        <h3 class="header">Workshop Details</h3>

        <p>
            <strong>Location:</strong>
            {{ $inquiry->details['city'] }},
            {{ $inquiry->details['state'] }}
        </p>

        <p>
            <strong>Approximate Participants:</strong>
            {{ $inquiry->details['participants'] }}
        </p>

        @if (!empty($inquiry->details['preferred_timeframe']))
            <p>
                <strong>Preferred Date or Timeframe:</strong>
                {{ $inquiry->details['preferred_timeframe'] }}
            </p>
        @endif

        @if (!empty($inquiry->details['nasda_experience']))
            <p>
                <strong>NASDA Experience:</strong>
                {{ $inquiry->details['nasda_experience'] }}
            </p>
        @endif

        <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">

        <h3 class="header">Message Details</h3>

        <div class="message-details">{{ $inquiry->message }}</div>

        <p class="footer">
            This request was submitted through the Southern Plains Sport Dog Club website.
            Reply to this email to contact the requester directly.
        </p>

    </div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>New Southern Plains Club Inquiry</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .header { color: #4CBB17; }
        .message-details { background-color: #f9f9f9; padding: 15px; border-radius: 4px; white-space: pre-wrap; }
        .footer { margin-top: 20px; font-size: 0.9em; color: #777; }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="header">New Inquiry: {{ $data['inquiry_type'] }}</h2>
        
        <p><strong>From:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</p>
        <p><strong>Email:</strong> <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
        
        @if (!empty($data['contact_phone']))
            <p><strong>Phone:</strong> {{ $data['contact_phone'] }}</p>
        @endif

        <p><strong>Current Member:</strong> {{ $data['is_member'] ?? 'No' }}</p>
        <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">

        <h3 class="header">Message Details:</h3>
        <div class="message-details">{{ $data['message'] }}</div>

        <p class="footer">Triage based on Inquiry Type: **{{ $data['inquiry_type'] }}**</p>
    </div>
</body>
</html>
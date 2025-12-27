<!DOCTYPE html>
<html>
<head>
    <title>New Training History Submission</title>
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
        <h2 class="header">New Training History: {{ $data['dog_name'] }}</h2>
        
        <p><strong>From:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</p>
        <p><strong>Email:</strong> <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
        
        <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">

        <h3 class="header">Dog Profile:</h3>
        <p><strong>Name:</strong> {{ $data['dog_name'] }}</p>
        <p><strong>Breed:</strong> {{ $data['dog_breed'] ?? 'Not specified' }}</p>
        <p><strong>Age:</strong> {{ $data['dog_age'] ?? 'Not specified' }}</p>

        <h3 class="header">Training Goals:</h3>
        <div class="message-details">{{ $data['training_goals'] }}</div>

        @if (!empty($data['previous_training']))
            <h3 class="header">Previous Experience:</h3>
            <div class="message-details">{{ $data['previous_training'] }}</div>
        @endif

        @if (!empty($data['health_notes']))
            <h3 class="header">Health/Medical Notes:</h3>
            <div class="message-details">{{ $data['health_notes'] }}</div>
        @endif

        <p class="footer">Submitted via Southern Plains Sport Dog Club Website</p>
    </div>
</body>
</html>
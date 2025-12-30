<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { padding: 20px; border: 1px solid #eee; border-radius: 5px; max-width: 600px; }
        .header { border-bottom: 2px solid #f4f4f4; padding-bottom: 10px; margin-bottom: 20px; }
        .label { font-weight: bold; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Trick Evaluation Request: {{ $formData['dog_name'] }}</h2>
        </div>
        
        <p>A new history record has been submitted through the website form.</p>
        
        <p>
            <span class="label">First Name:</span> Name<br>
        </p>

        

        <p style="font-size: 12px; color: #999; margin-top: 30px;">
            This email was sent automatically from the Southern Plains mailing system.
        </p>
    </div>
</body>
</html>
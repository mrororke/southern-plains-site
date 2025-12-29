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
            <h2>New Training History Submission: {{ $formData['dog_name'] }}</h2>
        </div>
        
        <p>A new history record has been submitted through the website form.</p>
        
        <p>
            <span class="label">First Name:</span> {{ $formData['first_name'] }}<br>
            <span class="label">Last Name:</span> {{ $formData['last_name'] }}<br/>
            <span class="label">Phone Number:</span> {{ $formData['phone'] }}<br/>
            <span class="label">Email Address:</span> {{ $formData['email'] }}<br/>
            <span class="label">Preferred Contact Method:</span> {{ $formData['preferred_contact'] }}<br/>
            <span class="label">Location/Area:</span> {{ $formData['area'] }}<br/>
            <span class="label">Was Referred:</span> {{ $formData['referred'] }}<br/><br/>

            <span class="label">Dog Name:</span> {{ $formData['dog_name'] }}<br/>
            <span class="label">Dog Breed:</span> {{ $formData['dog_breed'] }}<br/>
            <span class="label">Dog Age:</span> {{ $formData['dog_age'] }}<br/>
            <span class="label">Dog Gender:</span> {{ $formData['gender'] }}<br/>
        </p>

        <p>
            <span class="label">How Can I Help?</span><br/> {{ $formData['how_can_i_help'] }}
        </p>

        <p>
            <span class="label">Who else is living in the home? Are there other pets?</span><br/> {{ $formData['home_occupants'] }}
        </p>

        <p>
            <span class="label">How long has this been a problem? Why are you seeking help now?</span><br/> {{ $formData['timeline'] }}
        </p>

        <p>
            <span class="label">Does your dog live indoors or outdoors?</span><br/> {{ $formData['dog_living'] }}
        </p>

        <p>
            <span class="label">Has your dog ever bitten anyone?</span><br/> {{ $formData['bite_history'] }}
        </p>

        <p style="font-size: 12px; color: #999; margin-top: 30px;">
            This email was sent automatically from the Southern Plains mailing system.
        </p>
    </div>
</body>
</html>
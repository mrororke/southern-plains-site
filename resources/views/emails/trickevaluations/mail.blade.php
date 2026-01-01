<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { padding: 20px; border: 1px solid #eee; border-radius: 5px; max-width: 600px; margin: 0 auto; }
        .header { border-bottom: 2px solid #f4f4f4; padding-bottom: 10px; margin-bottom: 20px; }
        .header h2 { margin: 0; color: #03CCFF; }
        .section { background: #f9f9f9; padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .label { font-weight: bold; color: #555; display: inline-block; width: 150px; }
        .dog-card { border-left: 4px solid #03CCFF; padding-left: 15px; margin-bottom: 15px; }
        .payment-box { background: #e7f9ff; padding: 10px; border: 1px solid #03CCFF; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Trick Evaluation Request</h2>
        </div>
        
       <p>A new evaluation request has been submitted through the website.</p>
    
    <div class="section">
        <h3 style="margin-top: 0;">Owner Information</h3>
        <p>
            <span class="label">Owner Name:</span> {{ $formData['owner_name'] }}<br>
            <span class="label">Email:</span> {{ $formData['email'] }}<br>
            <span class="label">Payment Method:</span> <strong>{{ $formData['payment_method'] }}</strong>
        </p>
    </div>

    <div class="section">
        <h3 style="margin-top: 0;">Evaluation Method</h3>
        <p>
            <span class="label">Method:</span> {{ $formData['eval_method'] == 'online' ? 'Video Submission' : 'In-Person Evaluation' }}<br>
            @if($formData['eval_method'] == 'online')
                <span class="label">Video Link:</span> <a href="{{ $formData['video_link'] }}">{{ $formData['video_link'] }}</a>
            @else
                <span class="label">Requested Time:</span> {{ $formData['scheduled_datetime'] }}
            @endif
        </p>
    </div>

    <div class="section">
        <h3 style="margin-top: 0;">Dog(s) for Evaluation</h3>
        
        <!-- Primary Dog -->
        <div class="dog-card">
            <p>
                <span class="label">Dog Name:</span> {{ $formData['dog_name'] }}<br>
                <span class="label">Reg #:</span> {{ $formData['dog_number'] }}<br>
                <span class="label">Level:</span> {{ $formData['trick_level'] }}
            </p>
        </div>

        <!-- Additional Dogs Loop -->
        @if(!empty($formData['additional_dog_names']))
            @foreach($formData['additional_dog_names'] as $index => $name)
                <div class="dog-card">
                    <p>
                        <span class="label">Dog Name:</span> {{ $name }}<br>
                        <span class="label">Reg #:</span> {{ $formData['additional_dog_numbers'][$index] ?? 'N/A' }}<br>
                        <span class="label">Level:</span> {{ $formData['additional_dog_levels'][$index] }}<br>
                        @if(!empty($formData['additional_dog_video'][$index]))
                            <span class="label">Video:</span> <a href="{{ $formData['additional_dog_video'][$index] }}">Link</a>
                        @endif
                    </p>
                </div>
            @endforeach
        @endif
    </div>

    <div class="payment-box">
        <p style="margin: 0; font-weight: bold;">
            Total Fee to Invoice: ${{ number_format($formData['total_fee'], 2) }}
        </p>
    </div>

    <p style="font-size: 12px; color: #999; margin-top: 30px;">
        This email was sent automatically from the Southern Plains mailing system.
    </p>
</div>

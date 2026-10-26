<h1>New NASDA Judge Request</h1>

<p>
    A new judge request has been submitted through the Southern Plains Sport Dog Club website.
</p>

<hr>

<p>
    <strong>Club / Organization:</strong><br>
    {{ $inquiry->details['organization'] ?? 'Not provided' }}
</p>

<p>
    <strong>Contact Name:</strong><br>
    {{ $inquiry->name }}
</p>

<p>
    <strong>Email:</strong><br>
    {{ $inquiry->email }}
</p>

<p>
    <strong>Proposed Trial Date(s):</strong><br>
    {{ $inquiry->details['trial_date'] ?? 'Not provided' }}
</p>

<p>
    <strong>Trial Location:</strong><br>
    {{ $inquiry->details['location'] ?? 'Not provided' }}
</p>

<hr>

<p>
    <strong>Classes & Levels Requested:</strong>
</p>

@if (!empty($inquiry->details['classes']))
    <ul>
        @foreach ($inquiry->details['classes'] as $class)
            <li>{{ $class }}</li>
        @endforeach
    </ul>
@else
    <p>Not provided</p>
@endif

<p>
    <strong>Equipment Rental:</strong><br>
    {{ ucfirst(str_replace('_', ' ', $inquiry->details['equipment_request'] ?? 'Not provided')) }}
</p>

@if (!empty($inquiry->details['equipment_needed']))
    <p>
        <strong>Equipment Needed:</strong><br>
        {!! nl2br(e($inquiry->details['equipment_needed'])) !!}
    </p>
@endif

<p>
    <strong>Apprentice / Shadow Judge:</strong><br>
    {{ ucfirst(str_replace('_', ' ', $inquiry->details['apprentice_request'] ?? 'Not provided')) }}
</p>

@if (!empty($inquiry->details['apprentice_details']))
    <p>
        <strong>Apprentice / Shadow Details:</strong><br>
        {!! nl2br(e($inquiry->details['apprentice_details'])) !!}
    </p>
@endif

@if (!empty($inquiry->message))
    <p>
        <strong>Additional Information:</strong><br>
        {!! nl2br(e($inquiry->message)) !!}
    </p>
@endif

<hr>

<p>
    This request has also been added to the Southern Plains Sport Dog Club admin dashboard.
</p>
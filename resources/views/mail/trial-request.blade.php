<h1>New NASDA Trial Request</h1>

<p>
    A new trial request has been submitted through the Southern Plains Sport Dog Club website.
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
    <strong>Trial Venue:</strong><br>
    {{ $inquiry->details['venue'] ?? 'Not provided' }}
</p>

<p>
    <strong>City / State:</strong><br>
    {{ $inquiry->details['city_state'] ?? 'Not provided' }}
</p>

<p>
    <strong>Venue Status:</strong><br>
    {{ ucfirst(str_replace('_', ' ', $inquiry->details['venue_status'] ?? 'Not provided')) }}
</p>

<p>
    <strong>Trial Format:</strong><br>
    {{ ucfirst(str_replace('_', ' ', $inquiry->details['trial_format'] ?? 'Not provided')) }}
</p>

<hr>

<p>
    <strong>Classes Requested:</strong>
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
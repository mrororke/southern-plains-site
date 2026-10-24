<h1>New Contact Inquiry</h1>

<p>
    A new contact inquiry has been submitted through the Southern Plains Sport Dog Club website.
</p>

<hr>

<p>
    <strong>Name:</strong><br>
    {{ $inquiry->name }}
</p>

<p>
    <strong>Email:</strong><br>
    {{ $inquiry->email }}
</p>

<p>
    <strong>Inquiry:</strong><br>
    {{ $inquiry->details['inquiry'] ?? 'Not provided' }}
</p>

<p>
    <strong>Message:</strong><br>
    {!! nl2br(e($inquiry->message)) !!}
</p>

<hr>

<p>
    This inquiry has also been added to the Southern Plains Sport Dog Club admin dashboard.
</p>
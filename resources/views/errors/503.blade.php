@extends('layouts.base-errors')

@section('page_content')
<h4 class="uppercase text-xs font-bold">Error 503 | Service Unavailable</h4>
<h1 class="font-heading text-7xl">Quiet Time!<br/>The humans are cleaning<br/>my kennel. We'll be back soon.</h1>

<h3 class="lg:text-2xl text-lg mb-2 mt-2 text-black">
We’re currently giving the server a bath. <br/>It will be back and squeaky clean soon! <br/>Thanks for your patience while we tidy up.
</h3>

<p class="font-bold text-lg mb-3">Don't worry, let's get you back on track:</p>

<ul class="list-disc list-inside space-y-2 text-base text-black">
<li>
<a href="/" class="text-club hover:text-club-darker font-semibold">Go to the Homepage</a> and start fresh.
</li>
<li>
If you followed a link, please let us know by visiting our <a href="/contact" class="text-club hover:text-club-darker font-semibold">Contact Page</a>.
</li>
<li>
<a href="/events" class="text-club hover:text-club-darker font-semibold">See our training schedule</a> to find a class.
</li>
</ul>

@endsection
@extends('layouts.base-errors')

@section('page_content')
<h4 class="uppercase text-xs font-bold">Error 503 | Service Unavailable</h4>
<h1 class="font-heading text-7xl">Quiet Time!<br/>The humans are tidying<br/>up. We'll be back.</h1>

<h3 class="lg:text-2xl text-lg mb-2 mt-2 text-black">
We’ve temporarily paused the site to roll out important updates <br/>and improvements. Our team is working hard to finish <br/>this scheduled maintenance. Please check back shortly!
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
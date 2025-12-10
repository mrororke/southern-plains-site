@extends('layouts.base-errors')

@section('page_content')
<h4 class="uppercase text-xs font-bold">Error 500 | Internal Server Error</h4>
<h1 class="font-heading md:text-7xl text-5xl">Uh oh... I think I ate some bad kibble.<br/>The server is sick.</h1>

<h3 class="lg:text-2xl text-lg mb-2 mt-2 text-black">
The server is resting after eating some bad code.<br/>It’s not you, it’s us! We've been notified and are fetching help now.
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
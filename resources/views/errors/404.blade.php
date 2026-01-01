@extends('layouts.base-errors')

@section('page_content')
<h4 class="uppercase text-xs font-bold">Error 404 | File Not Found</h4>
<h1 class="font-heading text-7xl">I looked,<br /> but I can't find it!</h1>

<h3 class="lg:text-2xl text-lg mb-2 mt-2 text-black">
Oops! Looks like Hamish couldn't sniff out this page.<br/>It might have moved to a new spot, been deleted,<br/> or the address was typed incorrectly.
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
@props([
    'title',
])

@php
    $hour = now()->hour;

    $greeting = match (true) {
        $hour >= 5 && $hour < 12 => 'Good morning',
        $hour >= 12 && $hour < 17 => 'Good afternoon',
        $hour >= 17 && $hour < 22 => 'Good evening',
        default => 'Good night',
    };
@endphp

<div class="mb-6">

    <h1 class="font-sans text-5xl text-sp-charcoal">
        {{ $title }}
    </h1>

    <p class="mt-2 text-sm text-sp-slate">
        {{ $greeting }}, {{ Auth::user()->name }}.<br/>
        Search the backend or pick up where you left off.
    </p>

</div>
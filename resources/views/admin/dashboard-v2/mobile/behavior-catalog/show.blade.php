@extends('admin.dashboard-v2.mobile.shell')

@section('title', $behavior->name)

@section('content')

<div class="mb-4">
    <a
        href="{{ route('admin-v2.behavior-catalog.index') }}"
        class="inline-flex items-center text-sm font-semibold
                   text-sp-prairieGreen transition-colors
                   hover:text-sp-prairieOchre">
        &larr; Behavior Catalog
    </a>
</div>

<header class="mb-6">
    <p class="mb-1 text-xs font-semibold uppercase tracking-wide text-sp-burntClay font-display">
        Behavior
    </p>

    <h1 class="font-heading text-4xl leading-tight text-sp-charcoal">
        {{ $behavior->name }}
    </h1>

    @if($behavior->levels->isNotEmpty())
    <p class="mt-3 text-sm italic text-sp-slate">
        {{ $behavior->levels
            ->pluck('name')
            ->map(fn ($name) => ucwords(str_replace('_', ' ', $name)))
            ->join(', ') }}
    </p>
    @endif
</header>

@if($behavior->notes)
<section class="mb-6">
    <h2 class="mb-2 text-xs font-semibold uppercase tracking-wide text-sp-slate">
        Notes
    </h2>

    <div class="prose prose-sm max-w-none rounded-md bg-sp-limestone px-5 py-4">
        {!! $behavior->notes !!}
    </div>
</section>
@endif

@if($behavior->preferredVideo)
<section class="mb-6">
    <h2 class="mb-2 text-xs font-semibold uppercase tracking-wide text-sp-slate">
        Preferred Video
    </h2>

    <a
        href="{{ $behavior->preferredVideo->url }}"
        target="_blank"
        rel="noopener noreferrer"
        class="block rounded-md bg-sp-prairieGreen px-5 py-4
                       text-sp-warmIvory transition-colors
                       hover:bg-sp-prairieOchre">
        <span class="block font-semibold">
            Watch preferred video
        </span>

        @if($behavior->preferredVideo->creator)
        <span class="mt-1 block text-sm">
            {{ $behavior->preferredVideo->creator }}
        </span>
        @endif
    </a>
</section>
@endif

@php
$otherVideos = $behavior->videos
->where('is_preferred', false)
->values();
@endphp

@if($otherVideos->isNotEmpty())
<section class="mb-6">
    <h2 class="mb-2 text-xs font-semibold uppercase tracking-wide text-sp-slate">
        Additional Videos
    </h2>

    <div class="overflow-hidden rounded-md border border-sp-warmStone">
        @foreach($otherVideos as $video)
        <a
            href="{{ $video->url }}"
            target="_blank"
            rel="noopener noreferrer"
            class="block px-5 py-4 text-sp-charcoal
                               transition-colors hover:bg-sp-limestone
                               {{ $loop->last ? '' : 'border-b border-sp-warmStone' }}">
            <span class="block font-semibold">
                {{ ucfirst($video->platform ?? 'Video') }}
            </span>

            @if($video->creator)
            <span class="mt-1 block text-sm text-sp-slate">
                {{ $video->creator }}
            </span>
            @endif
        </a>
        @endforeach
    </div>
</section>
@endif

@if(! $behavior->preferredVideo && $behavior->videos->isEmpty())
<section class="mb-6 rounded-md bg-sp-limestone px-5 py-4">
    <p class="text-sm text-sp-slate">
        No videos have been added to this behavior yet.
    </p>
</section>
@endif

@endsection
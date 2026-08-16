@vite('resources/js/admin/behavior-catalog/show.js')

@extends('admin.dashboard-v2.mobile.shell')

@section('title', $behavior->name)

@section('content')

@php
    $behaviorData = [
        'id' => $behavior->id,
        'name' => $behavior->name,
        'videos' => $behavior->videos
            ->map(fn ($video) => [
                'id' => $video->id,
                'url' => $video->url,
                'platform' => $video->platform,
                'creator' => $video->creator,
                'is_preferred' => $video->is_preferred,
            ])
            ->values(),
    ];

    $otherVideos = $behavior->videos
        ->reject(function ($video) {
            return in_array(
                $video->is_preferred,
                [1, '1', true, 'true'],
                true
            );
        })
        ->values();

    $platformLabels = [
        'youtube' => 'YouTube',
        'tiktok' => 'TikTok',
        'instagram' => 'Instagram',
        'facebook' => 'Facebook',
        'unknown' => 'Unknown Platform',
    ];
@endphp

<div x-data='behaviorShow(@json($behaviorData))'>

    {{-- Back link --}}
    <div class="mb-4">
        <a
            href="{{ route('admin-v2.behavior-catalog.index') }}"
            class="inline-flex items-center gap-1 text-sm font-semibold
                   text-sp-prairieGreen transition-colors
                   hover:text-sp-prairieOchre"
        >
            <x-icons.chevron-left class="h-4 w-4" />

            Behavior Catalog
        </a>
    </div>

    {{-- Header --}}
    <header class="mb-6">
        <p
            class="mb-1 font-display text-sm uppercase tracking-wide
                   text-sp-burntClay"
        >
            Behavior
        </p>

        <h1
            class="font-sans text-4xl font-semibold leading-tight
                   text-sp-charcoal"
        >
            {{ $behavior->name }}
        </h1>

        @if($behavior->levels->isNotEmpty())
            <p class="mt-3 text-sm italic text-sp-slate">
                {{ $behavior->levels
                    ->pluck('name')
                    ->map(
                        fn ($name) => ucwords(
                            str_replace('_', ' ', $name)
                        )
                    )
                    ->join(', ') }}
            </p>
        @else
            <p class="mt-3 text-sm italic text-sp-slate">
                No category assigned.
            </p>
        @endif
    </header>

    {{-- Copy actions --}}
    <section class="mb-6">
        <h2
            class="mb-2 text-xs font-semibold uppercase tracking-wide
                   text-sp-slate"
        >
            Copy Resources
        </h2>

        <div class="flex flex-wrap gap-2">
            <button
                type="button"
                @click="copySimple()"
                class="inline-flex items-center gap-1.5 rounded-md
                       bg-[#B78A45] px-3 py-2 text-xs font-semibold
                       text-sp-warmIvory transition hover:brightness-95"
            >
                <x-icons.copy class="h-3 w-3" />

                <span
                    x-text="
                        copiedAction === 'simple'
                            ? 'Copied'
                            : 'Copy Simple'
                    "
                ></span>
            </button>

            <button
                type="button"
                @click="copyGrouped()"
                class="inline-flex items-center gap-1.5 rounded-md
                       bg-[#9B5C3A] px-3 py-2 text-xs font-semibold
                       text-sp-warmIvory transition hover:brightness-95"
            >
                <x-icons.copy class="h-3 w-3" />

                <span
                    x-text="
                        copiedAction === 'grouped'
                            ? 'Copied'
                            : 'Copy Grouped'
                    "
                ></span>
            </button>

            @if($behavior->preferredVideo)
                <button
                    type="button"
                    @click="copyPreferred()"
                    class="inline-flex items-center gap-1.5 rounded-md
                           bg-[#D8B64C] px-3 py-2 text-xs font-semibold
                           text-sp-charcoal transition hover:brightness-95"
                >
                    <x-icons.copy class="h-3 w-3" />

                    <span
                        x-text="
                            copiedAction === 'preferred'
                                ? 'Copied'
                                : 'Copy Preferred'
                        "
                    ></span>
                </button>
            @endif
        </div>

        <p
            x-show="copiedAction === 'failed'"
            x-cloak
            class="mt-2 text-sm font-medium text-sp-burntClay"
        >
            Unable to copy. Please try again.
        </p>
    </section>

    {{-- Notes --}}
    <section class="mb-6">
        <h2
            class="mb-2 text-xs font-semibold uppercase tracking-wide
                   text-sp-slate"
        >
            Notes
        </h2>

        @if($behavior->notes)
            <div
                class="prose prose-sm max-w-none
                        rounded-md bg-sp-warmIvory px-5 py-4"
            >
                {!! $behavior->notes !!}
            </div>
        @else
            <div class="rounded-md bg-sp-warmIvory px-5 py-4">
                <p class="text-sm italic text-sp-slate">
                    No notes entered.
                </p>
            </div>
        @endif
    </section>

    {{-- Preferred video --}}
    @if($behavior->preferredVideo)
        <section class="mb-6">
            <h2
                class="mb-2 text-xs font-semibold uppercase tracking-wide
                       text-sp-slate"
            >
                Preferred Video
            </h2>

            <div
                class="rounded-md border-l-4 border-[#D8B64C]
                       bg-[#D8B64C]/15 px-5 py-4"
            >
                <div class="flex items-start justify-between gap-3">
                    <div class="min-w-0">
                        <p class="font-semibold text-sp-charcoal">
                            {{ $behavior->preferredVideo->creator
                                ?: 'Untitled Video' }}
                        </p>

                        <p
                            class="mt-1 text-xs uppercase tracking-wide
                                   text-sp-slate"
                        >
                            {{ $platformLabels[
                                strtolower(
                                    $behavior->preferredVideo->platform
                                    ?? 'unknown'
                                )
                            ] ?? ucfirst(
                                $behavior->preferredVideo->platform
                                ?? 'Unknown Platform'
                            ) }}
                        </p>

                        <p
                            class="mt-2 text-xs font-semibold uppercase
                                   tracking-wide text-[#9B5C3A]"
                        >
                            Recommended
                        </p>
                    </div>
                </div>

                <div class="mt-4 flex flex-wrap gap-2">
                    <a
                        href="{{ $behavior->preferredVideo->url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-1.5 rounded-md
                               bg-sp-charcoal px-3 py-2 text-xs
                               font-semibold text-sp-warmIvory
                               transition-colors hover:bg-[#9B5C3A]"
                    >
                        <x-icons.external-link class="h-3 w-3" />

                        Open
                    </a>

                    <button
                        type="button"
                        @click="
                            copyVideoUrl(
                                @js($behavior->preferredVideo->url),
                                {{ $behavior->preferredVideo->id }}
                            )
                        "
                        class="inline-flex items-center gap-1.5 rounded-md
                               border border-sp-warmStone bg-sp-warmIvory
                               px-3 py-2 text-xs font-semibold
                               text-sp-charcoal transition-colors
                               hover:bg-sp-limestone"
                    >
                        <x-icons.copy class="h-3 w-3" />

                        <span
                            x-text="
                                copiedAction ===
                                    'video-{{ $behavior->preferredVideo->id }}'
                                    ? 'Copied'
                                    : 'Copy Link'
                            "
                        ></span>
                    </button>
                </div>
            </div>
        </section>
    @endif

    {{-- Additional videos --}}
    @if($otherVideos->isNotEmpty())
        <section class="mb-6">
            <h2
                class="mb-2 text-xs font-semibold uppercase tracking-wide
                       text-sp-slate"
            >
                Additional Videos
            </h2>

            <div
                class="overflow-hidden rounded-md
                       border border-sp-warmStone"
            >
                @foreach($otherVideos as $video)
                    <article
                        class="px-5 py-4
                               {{ $loop->last
                                    ? ''
                                    : 'border-b border-sp-warmStone' }}"
                    >
                        <p class="font-semibold text-sp-charcoal">
                            {{ $video->creator ?: 'Untitled Video' }}
                        </p>

                        <p
                            class="mt-1 text-xs uppercase tracking-wide
                                   text-sp-slate"
                        >
                            {{ $platformLabels[
                                strtolower($video->platform ?? 'unknown')
                            ] ?? ucfirst(
                                $video->platform ?? 'Unknown Platform'
                            ) }}
                        </p>

                        <div class="mt-3 flex flex-wrap gap-2">
                            <a
                                href="{{ $video->url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-1.5
                                       rounded-md bg-sp-charcoal px-3 py-2
                                       text-xs font-semibold
                                       text-sp-warmIvory transition-colors
                                       hover:bg-[#9B5C3A]"
                            >
                                <x-icons.external-link class="h-3 w-3" />

                                Open
                            </a>

                            <button
                                type="button"
                                @click="
                                    copyVideoUrl(
                                        @js($video->url),
                                        {{ $video->id }}
                                    )
                                "
                                class="inline-flex items-center gap-1.5
                                       rounded-md border
                                       border-sp-warmStone bg-sp-warmIvory
                                       px-3 py-2 text-xs font-semibold
                                       text-sp-charcoal transition-colors
                                       hover:bg-sp-limestone"
                            >
                                <x-icons.copy class="h-3 w-3" />

                                <span
                                    x-text="
                                        copiedAction === 'video-{{ $video->id }}'
                                            ? 'Copied'
                                            : 'Copy Link'
                                    "
                                ></span>
                            </button>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @elseif($behavior->preferredVideo)
        <section class="mb-6">
            <h2
                class="mb-2 text-xs font-semibold uppercase tracking-wide
                       text-sp-slate"
            >
                Additional Videos
            </h2>

            <div class="rounded-md bg-sp-limestone px-5 py-4">
                <p class="text-sm italic text-sp-slate">
                    No additional videos added.
                </p>
            </div>
        </section>
    @else
        <section class="mb-6 rounded-md bg-sp-limestone px-5 py-4">
            <p class="text-sm text-sp-slate">
                No videos have been added to this behavior yet.
            </p>
        </section>
    @endif

</div>

@endsection
@extends('admin.dashboard-v2.mobile.shell')

@section('title', $resource->title)

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Delivery Metadata
    |--------------------------------------------------------------------------
    */

    $deliveryParts = [];

    $sessionYear = trim(
        collect([
            $resource->session
                ? ucfirst($resource->session)
                : null,
            $resource->year,
        ])
            ->filter()
            ->join(' ')
    );

    if ($sessionYear !== '') {
        $deliveryParts[] = $sessionYear;
    }

    if ($resource->week_number) {
        $deliveryParts[] = 'Week ' . $resource->week_number;
    }

    $deliveryLabel = implode(' · ', $deliveryParts);


    /*
    |--------------------------------------------------------------------------
    | More in this Series
    |--------------------------------------------------------------------------
    |
    | Mobile only shows other active Resources.
    |
    */

    $otherSeriesResources = $seriesResources
        ->filter(function ($seriesResource) use ($resource) {
            return $seriesResource->id !== $resource->id
                && $seriesResource->status === 'active';
        })
        ->sortByDesc(function ($seriesResource) {
            return $seriesResource->first_sent?->timestamp
                ?? $seriesResource->created_at->timestamp;
        })
        ->values();


    /*
    |--------------------------------------------------------------------------
    | Version History
    |--------------------------------------------------------------------------
    */

    $versionHistory = $resource->versionHistory();
@endphp


{{-- Back Link --}}
<div class="mb-4">
    <a
        href="{{ route('admin-v2.resource-library.index') }}"
        class="inline-flex items-center gap-1 text-sm font-semibold
               text-sp-prairieGreen transition-colors
               hover:text-sp-prairieOchre"
    >
        <x-icons.chevron-left class="h-4 w-4" />

        Resource Library
    </a>
</div>


{{-- Header --}}
<header class="mb-6">

    <p
        class="mb-1 font-display text-sm uppercase tracking-wide
               text-sp-burntClay"
    >
        Resource
    </p>

    @if($resource->series)
        <p
            class="mb-1 text-sm font-semibold
                   text-sp-slate"
        >
            {{ $resource->series->name }}
        </p>
    @endif

    <h1
        class="font-sans text-4xl font-semibold leading-tight
               text-sp-charcoal"
    >
        {{ $resource->title }}
    </h1>

    @if($deliveryLabel !== '')
        <p class="mt-3 text-sm font-semibold text-sp-charcoal">
            {{ $deliveryLabel }}
        </p>
    @endif

    <p class="mt-1 text-sm text-sp-slate">
        {{ $resource->type->name }}

        <span aria-hidden="true">
            ·
        </span>

        {{ $resource->category->name }}
    </p>

</header>


{{-- Resource Content --}}
<section class="mb-6">

    <h2
        class="mb-2 text-xs font-semibold uppercase tracking-wide
               text-sp-slate"
    >
        Resource
    </h2>

    <div
        class="prose prose-sm max-w-none break-words
                overflow-hidden rounded-md
               bg-sp-warmIvory px-5 py-4

               prose-headings:font-sans
               prose-headings:font-semibold
               prose-headings:text-sp-charcoal

               prose-p:text-sp-charcoal
               prose-p:leading-relaxed

               prose-strong:text-sp-charcoal

               prose-a:font-medium
               prose-a:text-sp-prairieGreen
               prose-a:underline
               hover:prose-a:text-sp-burntClay

               prose-ul:list-disc
               prose-ul:pl-5

               prose-ol:list-decimal
               prose-ol:pl-5

               prose-li:text-sp-charcoal

                prose-a:break-all
                prose-code:break-all
                prose-pre:whitespace-pre-wrap
                prose-pre:break-words

               prose-blockquote:border-l-4
               prose-blockquote:border-sp-burntClay
               prose-blockquote:bg-sp-limestone/30
               prose-blockquote:px-4
               prose-blockquote:py-2
               prose-blockquote:not-italic
               prose-blockquote:text-sp-slate"
    >
        {!! $resource->body !!}
    </div>

</section>


{{-- More in this Series --}}
@if($resource->series && $otherSeriesResources->isNotEmpty())

    <section class="mb-6">

        <div class="mb-2">

            <h2
                class="text-xs font-semibold uppercase tracking-wide
                       text-sp-slate"
            >
                More in this Series
            </h2>

            <p class="mt-1 text-sm text-sp-charcoal">
                {{ $resource->series->name }}
            </p>

        </div>

        <div
            class="overflow-hidden rounded-md border
                   border-sp-warmStone bg-white"
        >
            @foreach($otherSeriesResources as $seriesResource)

                <div
                    @class([
                        'border-b border-sp-warmStone' => ! $loop->last,
                    ])
                >
                    @include(
                        'admin.dashboard-v2.resource-library.partials.catalog-card',
                        [
                            'resource' => $seriesResource,
                            'mode' => 'mobile',
                        ]
                    )
                </div>

            @endforeach
        </div>

    </section>

@endif


{{-- Version History --}}
@if($versionHistory->count() > 1)

    <section class="mb-6">

        <h2
            class="mb-2 text-xs font-semibold uppercase tracking-wide
                   text-sp-slate"
        >
            Version History
        </h2>

        <div
            class="overflow-hidden rounded-md border
                   border-sp-warmStone bg-white"
        >

            @foreach($versionHistory as $version)

                @php
                    $versionSessionYear = trim(
                        collect([
                            $version->session
                                ? ucfirst($version->session)
                                : null,
                            $version->year,
                        ])
                            ->filter()
                            ->join(' ')
                    );

                    $versionLabel = $versionSessionYear !== ''
                        ? $versionSessionYear
                        : $version->title;
                @endphp

                @if($version->id === $resource->id)

                    <div
                        class="border-l-4 border-sp-burntClay
                               bg-sp-limestone/40 px-5 py-4
                               {{ ! $loop->last
                                    ? 'border-b border-sp-warmStone'
                                    : '' }}"
                    >
                        <p class="font-semibold text-sp-charcoal">
                            {{ $versionLabel }}
                        </p>

                        <div
                            class="mt-1 flex flex-wrap items-center gap-2
                                   text-xs"
                        >
                            @if($version->week_number)

                                <span class="text-sp-slate">
                                    Week {{ $version->week_number }}
                                </span>

                                <span
                                    aria-hidden="true"
                                    class="text-sp-warmStone"
                                >
                                    ·
                                </span>

                            @endif

                            <span
                                class="font-semibold uppercase tracking-wide
                                       text-sp-burntClay"
                            >
                                Currently Viewing
                            </span>
                        </div>
                    </div>

                @else

                    <a
                        href="{{ route(
                            'admin-v2.resource-library.show',
                            $version
                        ) }}"
                        class="group flex items-center
                               justify-between gap-4 px-5 py-4
                               transition-colors
                               hover:bg-sp-limestone/20
                               {{ ! $loop->last
                                    ? 'border-b border-sp-warmStone'
                                    : '' }}"
                    >
                        <div class="min-w-0">

                            <p
                                class="font-semibold text-sp-charcoal
                                       transition-colors
                                       group-hover:text-sp-prairieGreen"
                            >
                                {{ $versionLabel }}
                            </p>

                            @if($version->week_number)
                                <p class="mt-1 text-xs text-sp-slate">
                                    Week {{ $version->week_number }}
                                </p>
                            @endif

                        </div>

                        <x-icons.chevron-right
                            class="h-4 w-4 shrink-0 text-sp-slate
                                   transition-transform
                                   group-hover:translate-x-1"
                        />

                    </a>

                @endif

            @endforeach

        </div>

    </section>

@endif


{{-- Related Behaviors --}}
@if($resource->tricks->isNotEmpty())

    <section class="mb-6">

        <h2
            class="mb-2 text-xs font-semibold uppercase tracking-wide
                   text-sp-slate"
        >
            Related Behaviors
        </h2>

        <div
            class="overflow-hidden rounded-md border
                   border-sp-warmStone bg-white"
        >

            @foreach($resource->tricks as $behavior)

                <a
                    href="{{ route(
                        'admin-v2.behavior-catalog.show',
                        $behavior
                    ) }}"
                    class="group flex items-center
                           justify-between gap-4 px-5 py-4
                           transition-colors
                           hover:bg-sp-limestone/20
                           {{ ! $loop->last
                                ? 'border-b border-sp-warmStone'
                                : '' }}"
                >

                    <p
                        class="font-semibold text-sp-charcoal
                               transition-colors
                               group-hover:text-sp-prairieGreen"
                    >
                        {{ $behavior->name }}
                    </p>

                    <x-icons.chevron-right
                        class="h-4 w-4 shrink-0 text-sp-slate
                               transition-transform
                               group-hover:translate-x-1"
                    />

                </a>

            @endforeach

        </div>

    </section>

@endif


{{-- Related Resources --}}
@if($relatedResources->isNotEmpty())

    <section class="mb-6">

        <h2
            class="mb-2 text-xs font-semibold uppercase tracking-wide
                   text-sp-slate"
        >
            Related Resources
        </h2>

        <div
            class="overflow-hidden rounded-md border
                   border-sp-warmStone bg-white"
        >

            @foreach($relatedResources as $relatedResource)

                <div
                    @class([
                        'border-b border-sp-warmStone' => ! $loop->last,
                    ])
                >
                    @include(
                        'admin.dashboard-v2.resource-library.partials.catalog-card',
                        [
                            'resource' => $relatedResource,
                            'mode' => 'mobile',
                        ]
                    )
                </div>

            @endforeach

        </div>

    </section>

@endif


{{-- About this Resource --}}
<section class="mb-6">

    <h2
        class="mb-2 text-xs font-semibold uppercase tracking-wide
               text-sp-slate"
    >
        About this Resource
    </h2>

    <dl
        class="divide-y divide-sp-warmStone overflow-hidden
               rounded-md bg-sp-warmIvory"
    >

        <div class="px-5 py-4">
            <dt
                class="text-xs font-semibold uppercase tracking-wide
                       text-sp-slate"
            >
                First Sent
            </dt>

            <dd class="mt-1 text-sm text-sp-charcoal">
                {{ $resource->first_sent
                    ? $resource->first_sent->format('M j, Y')
                    : 'Never Sent' }}
            </dd>
        </div>


        <div class="px-5 py-4">
            <dt
                class="text-xs font-semibold uppercase tracking-wide
                       text-sp-slate"
            >
                Type
            </dt>

            <dd class="mt-1 text-sm text-sp-charcoal">
                {{ $resource->type->name }}
            </dd>
        </div>


        <div class="px-5 py-4">
            <dt
                class="text-xs font-semibold uppercase tracking-wide
                       text-sp-slate"
            >
                Category
            </dt>

            <dd class="mt-1 text-sm text-sp-charcoal">
                {{ $resource->category->name }}
            </dd>
        </div>


        @if($resource->series)

            <div class="px-5 py-4">
                <dt
                    class="text-xs font-semibold uppercase tracking-wide
                           text-sp-slate"
                >
                    Series
                </dt>

                <dd class="mt-1 text-sm text-sp-charcoal">
                    {{ $resource->series->name }}
                </dd>
            </div>

        @endif


        <div class="px-5 py-4">
            <dt
                class="text-xs font-semibold uppercase tracking-wide
                       text-sp-slate"
            >
                Created
            </dt>

            <dd class="mt-1 text-sm text-sp-charcoal">
                {{ $resource->created_at->format('M j, Y') }}
            </dd>
        </div>


        <div class="px-5 py-4">
            <dt
                class="text-xs font-semibold uppercase tracking-wide
                       text-sp-slate"
            >
                Updated
            </dt>

            <dd class="mt-1 text-sm text-sp-charcoal">
                {{ $resource->updated_at->format('M j, Y') }}
            </dd>
        </div>

    </dl>

</section>

@endsection
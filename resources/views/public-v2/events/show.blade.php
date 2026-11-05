@extends('public-v2.layouts.app')


@php

    $eventType = match ($event->type) {
        'dog_sports' => 'Dog Sports',
        'training' => 'Training',
        'workshop' => 'Workshop',
        'class' => 'Class',
        'community' => 'Community',
        default => 'Event',
    };

    $isPast = $event->hasEnded();

    $registrationStatus = $event->effective_registration_status;

    $registrationLabel = match ($registrationStatus) {
        'open' => 'Registration Open',
        'coming_soon' => 'Registration Coming Soon',
        'closed' => 'Registration Closed',
        'not_required' => 'No Registration Required',
        default => 'Registration',
    };

@endphp


@section(
    'meta_title',
    $event->seo_title ?: $event->title . ' | Southern Plains Sport Dog Club'
)

@section(
    'meta_description',
    $event->seo_description ?: $event->short_description
)

@section('og_title', $event->seo_title ?: $event->title)

@section(
    'og_description',
    $event->seo_description ?: $event->short_description
)

@section(
    'og_image',
    $event->featured_image_path
        ? \Illuminate\Support\Facades\Storage::disk('public')->url($event->featured_image_path)
        : asset('images/og/default.jpg')
)

@section(
    'canonical_url',
    route('public-v2.events.show', $event->slug)
)


@section('content')

{{-- Event Page --}}
<main>

    {{-- Breadcrumb --}}
    <div class="px-6 pt-8 md:px-8">

        <nav
            aria-label="Breadcrumb"
            class="text-sm text-sp-slate">

            <ol class="flex flex-wrap items-center gap-2">

                <li>
                    <a
                        href="{{ route('public-v2.events.index') }}"
                        class="transition-colors hover:text-sp-prairieOchre">
                        Events
                    </a>
                </li>

                <li aria-hidden="true">
                    /
                </li>

                <li class="text-sp-charcoal">
                    {{ $event->title }}
                </li>

            </ol>

        </nav>

    </div>
    {{-- End Breadcrumb --}}


    {{-- Event Hero --}}
    <section class="grid grid-cols-12 gap-8 px-6 pt-10 pb-16 md:gap-10 md:px-8 md:pt-12 md:pb-20">

        {{-- Hero Details --}}
        <div class="col-span-12 flex flex-col justify-center md:col-span-5">

            <p class="text-eyebrow">
                {{ $eventType }}
            </p>

            <h1 class="text-hero text-sp-charcoal mt-2">
                {{ $event->title }}
            </h1>

            <div class="hl-break">
                <hr>
            </div>


            @if ($event->short_description)

                <p class="body-large text-sp-slate">
                    {{ $event->short_description }}
                </p>

            @endif


            {{-- Hero Metadata --}}
            <div class="mt-6 space-y-3 text-sp-slate">

                <div class="flex items-start gap-3">

                    <x-icons.calendar-range
                        class="mt-0.5 h-5 w-5 shrink-0"
                        aria-hidden="true"
                    />

                    <span>

                        @if ($event->end_date)

                            {{ $event->start_date->format('F j') }}
                            –
                            {{ $event->end_date->format('F j, Y') }}

                        @else

                            {{ $event->start_date->format('F j, Y') }}

                        @endif

                    </span>

                </div>


                @if ($event->start_time)

                    <div class="flex items-start gap-3">

                        <span
                            class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center text-xs font-semibold"
                            aria-hidden="true">
                            —
                        </span>

                        <span>

                            {{ $event->start_time->format('g:i A') }}

                            @if ($event->end_time)

                                –
                                {{ $event->end_time->format('g:i A') }}

                            @endif

                        </span>

                    </div>

                @endif


                @if ($event->city || $event->state)

                    <div class="flex items-start gap-3">

                        <x-icons.signpost
                            class="mt-0.5 h-5 w-5 shrink-0"
                            aria-hidden="true"
                        />

                        <span>

                            @if ($event->is_private_location)

                                {{ $event->city }}, {{ $event->state }}

                            @else

                                {{ $event->venue_name
                                    ? $event->venue_name . ', '
                                    : ''
                                }}

                                {{ $event->city }}, {{ $event->state }}

                            @endif

                        </span>

                    </div>

                @endif

            </div>
            {{-- End Hero Metadata --}}


            {{-- Hero CTA --}}
            @if (! $isPast && $event->registration_status !== 'not_required')

                @if ($registrationStatus === 'open' && $event->registration_url)

                    <div class="mt-7">

                        <a
                            href="{{ $event->registration_url }}"
                            class="inline-flex items-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-sp-prairieOchre"
                            target="_blank"
                            rel="noopener"
                        >

                            {{ $event->cta_label ?: 'Register Now' }}

                            <x-icons.move-right
                                class="h-4 w-4"
                                aria-hidden="true"
                            />

                        </a>

                    </div>

                @elseif ($registrationStatus === 'coming_soon')

                    <div class="mt-7">

                        <span class="inline-flex items-center gap-2 rounded-md bg-sp-limestone px-5 py-3 text-sm font-semibold text-sp-slate">
                            Registration Coming Soon
                        </span>

                    </div>

                @elseif ($registrationStatus === 'closed')

                    <div class="mt-7">

                        <span class="inline-flex items-center gap-2 rounded-md bg-sp-limestone px-5 py-3 text-sm font-semibold text-sp-slate">
                            Registration Closed
                        </span>

                    </div>

                @endif

            @elseif (! $isPast && $event->registration_status === 'not_required')

                @if ($event->cta_label && $event->cta_url)

                    <div class="mt-7">

                        <a
                            href="{{ $event->cta_url }}"
                            class="inline-flex items-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-sp-prairieOchre"
                            target="_blank"
                            rel="noopener"
                        >

                            {{ $event->cta_label }}

                            <x-icons.move-right
                                class="h-4 w-4"
                                aria-hidden="true"
                            />

                        </a>

                    </div>

                @endif

            @endif


            @if ($event->registration_deadline && ! $isPast)

                <p class="text-sm text-sp-slate mt-3">
                    Registration closes {{ $event->registration_deadline->format('F j, Y') }}.
                </p>

            @endif


            @if ($isPast)

                <p class="text-sm font-semibold text-sp-slate mt-7">
                    This event has already taken place.
                </p>

            @endif

        </div>
        {{-- End Hero Details --}}


        {{-- Hero Image --}}
        <div class="col-span-12 md:col-span-7 relative">

            @if ($event->featured_image_path)

                <img
                    src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($event->featured_image_path) }}"
                    alt="{{ $event->featured_image_alt ?? $event->title }}"
                    class="block aspect-[4/3] w-full rounded-md object-cover md:aspect-[4/3]"
                >

                @if ($event->featured_image_alt)

                    <x-public-v2.image-registration
                        text="{{ $event->featured_image_alt }}"
                        position="right"
                    />

                @endif

            @else

                <div class="flex aspect-[4/3] w-full items-center justify-center rounded-md bg-sp-limestone">

                    <span class="font-display text-2xl text-sp-slate">
                        Southern Plains Sport Dog Club
                    </span>

                </div>

            @endif

        </div>
        {{-- End Hero Image --}}

    </section>
    {{-- End Event Hero --}}


    {{-- Event Content --}}
    <section class="grid grid-cols-12 gap-8 bg-sp-warmIvory px-6 py-16 md:gap-12 md:px-8 md:py-20">

        {{-- Main Content --}}
        <div class="col-span-12 md:col-span-8">

            @if ($event->description)

                <section>

                    <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                        About This Event
                    </h2>

                    <div class="prose prose-lg max-w-none text-sp-slate mt-5">
                        {!! $event->description !!}
                    </div>

                </section>

            @endif


            @if ($event->what_to_expect)

                <section class="mt-12 border-t border-sp-warmStone pt-8">

                    <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                        What to Expect
                    </h2>

                    <div class="prose max-w-none text-sp-slate mt-4">
                        {!! $event->what_to_expect !!}
                    </div>

                </section>

            @endif


            @if ($event->what_to_bring)

                <section class="mt-12 border-t border-sp-warmStone pt-8">

                    <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                        What to Bring
                    </h2>

                    <div class="prose max-w-none text-sp-slate mt-4">
                        {!! $event->what_to_bring !!}
                    </div>

                </section>

            @endif


            @if ($event->requirements_notes)

                <section class="mt-12 border-t border-sp-warmStone pt-8">

                    <h2 class="font-sans text-2xl font-semibold text-sp-charcoal">
                        Requirements
                    </h2>

                    <div class="prose max-w-none text-sp-slate mt-4">
                        {!! $event->requirements_notes !!}
                    </div>

                </section>

            @endif

        </div>
        {{-- End Main Content --}}


        {{-- Event Details --}}
        <aside class="col-span-12 md:col-span-4">

            <div class="rounded-md bg-sp-limestone p-6 md:p-8">

                <p class="font-display font-bold text-2xl uppercase text-sp-burntClay">
                    Event Details
                </p>


                <div class="mt-5 border-t border-sp-warmStone pt-5 space-y-5">

                    {{-- Date --}}
                    <div class="flex items-start gap-3">

                        <x-icons.calendar-range
                            class="mt-0.5 h-5 w-5 shrink-0 text-sp-slate"
                            aria-hidden="true"
                        />

                        <div>

                            <p class="text-sm font-semibold text-sp-charcoal">
                                Date
                            </p>

                            <p class="body text-sp-slate mt-1">

                                @if ($event->end_date)

                                    {{ $event->start_date->format('F j') }}
                                    –
                                    {{ $event->end_date->format('F j, Y') }}

                                @else

                                    {{ $event->start_date->format('F j, Y') }}

                                @endif

                            </p>

                        </div>

                    </div>


                    {{-- Time --}}
                    @if ($event->start_time)

                        <div class="flex items-start gap-3">

                            <span
                                class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center text-xs font-semibold text-sp-slate"
                                aria-hidden="true">
                                —
                            </span>

                            <div>

                                <p class="text-sm font-semibold text-sp-charcoal">
                                    Time
                                </p>

                                <p class="body text-sp-slate mt-1">

                                    {{ $event->start_time->format('g:i A') }}

                                    @if ($event->end_time)

                                        –
                                        {{ $event->end_time->format('g:i A') }}

                                    @endif

                                </p>

                            </div>

                        </div>

                    @endif


                    {{-- Location --}}
                    @if ($event->city || $event->state)

                        <div class="flex items-start gap-3">

                            <x-icons.signpost
                                class="mt-0.5 h-5 w-5 shrink-0 text-sp-slate"
                                aria-hidden="true"
                            />

                            <div>

                                <p class="text-sm font-semibold text-sp-charcoal">
                                    Location
                                </p>

                                <p class="body text-sp-slate mt-1">

                                    @if ($event->is_private_location)

                                        Private location<br>
                                        {{ $event->city }}, {{ $event->state }}

                                    @else

                                        @if ($event->venue_name)
                                            {{ $event->venue_name }}<br>
                                        @endif

                                        @if ($event->address)
                                            {{ $event->address }}<br>
                                        @endif

                                        {{ $event->city }}, {{ $event->state }}

                                    @endif

                                </p>


                                @if ($event->location_details)

                                    <p class="text-sm text-sp-slate mt-3">
                                        {{ $event->location_details }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    @endif

                </div>


                {{-- Registration --}}
                @if ($event->registration_status !== 'not_required')

                    <div class="mt-7 border-t border-sp-warmStone pt-6">

                        <div class="flex items-start gap-3">

                            <x-icons.ticket
                                class="mt-0.5 h-5 w-5 shrink-0 text-sp-slate"
                                aria-hidden="true"
                            />

                            <div>

                                <p class="text-sm font-semibold text-sp-charcoal">
                                    Registration
                                </p>

                                <p class="body text-sp-slate mt-1">
                                    {{ $registrationLabel }}
                                </p>

                            </div>

                        </div>


                        @if ($event->registration_deadline && ! $isPast)

                            <p class="text-sm text-sp-slate mt-4">
                                Registration closes {{ $event->registration_deadline->format('F j, Y') }}.
                            </p>

                        @endif


                        @if (
                            $event->registration_notes
                            && ! $isPast
                        )

                            <div class="text-sm text-sp-slate mt-4">
                                {!! $event->registration_notes !!}
                            </div>

                        @endif


                        @if (
                            ! $isPast
                            && $registrationStatus === 'open'
                            && $event->registration_url
                        )

                            <a
                                href="{{ $event->registration_url }}"
                                class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-sp-prairieOchre"
                                target="_blank"
                                rel="noopener"
                            >

                                {{ $event->cta_label ?: 'Register Now' }}

                                <x-icons.move-right
                                    class="h-4 w-4"
                                    aria-hidden="true"
                                />

                            </a>

                        @endif

                    </div>

                @elseif (
                    ! $isPast
                    && $event->cta_label
                    && $event->cta_url
                )

                    <div class="mt-7 border-t border-sp-warmStone pt-6">

                        <a
                            href="{{ $event->cta_url }}"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-sp-prairieOchre"
                            target="_blank"
                            rel="noopener"
                        >

                            {{ $event->cta_label }}

                            <x-icons.move-right
                                class="h-4 w-4"
                                aria-hidden="true"
                            />

                        </a>

                    </div>

                @endif

            </div>

        </aside>
        {{-- End Event Details --}}

    </section>
    {{-- End Event Content --}}


    {{-- Back to Events --}}
    <div class="px-6 py-12 md:px-8 md:py-16">

        <a
            href="{{ route('public-v2.events.archive') }}"
            class="inline-flex items-center gap-2 font-semibold text-sp-prairieGreen transition-colors hover:text-sp-prairieOchre"
        >

            <span aria-hidden="true">←</span>

            Back to Events

        </a>

    </div>
    {{-- End Back to Events --}}

</main>
{{-- End Event Page --}}

@endsection
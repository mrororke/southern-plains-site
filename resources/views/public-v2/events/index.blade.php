@extends('public-v2.layouts.app')


@section('meta_title', 'Events | Southern Plains Sport Dog Club')

@section('meta_description', 'Explore upcoming events, dog sports, workshops, classes, and community gatherings at Southern Plains Sport Dog Club.')

@section('og_title', 'Events | Southern Plains Sport Dog Club')

@section('og_description', 'See what is coming up at Southern Plains Sport Dog Club, from NASDA trials and workshops to training classes and community events.')

@section('og_image', $featuredEvent?->featured_image_path
    ? \Illuminate\Support\Facades\Storage::disk('public')->url($featuredEvent->featured_image_path)
    : asset('images/og/default.jpg')
)

@section('canonical_url', url('/v2/events'))


@section('hero')

{{-- Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 pt-8">

    <div class="col-span-12 md:col-span-5 md:pr-0 pl-8 pr-8">

        <p class="text-eyebrow">
            Events
        </p>

        <h1 class="text-hero text-sp-charcoal">
            Come Play With Us.
        </h1>

        <div class="hl-break">
            <hr>
        </div>

        <p class="body-large text-sp-slate">
            Find upcoming dog sports, workshops, training opportunities, and other ways to play, train, and grow together.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 py-6">

            <a
                href="#upcoming"
                class="btn-primary">
                See What's Coming Up
            </a>

            <a
                href="#find-your-thing"
                class="btn-primary-outline">
                Find Your Thing
            </a>

        </div>

    </div>

    <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">

        <img
            class="w-full h-full"
            src="{{ asset('images/headers/header-events.png') }}"
            alt="Southern Plains Sport Dog Club events.">

        <x-public-v2.image-registration
            text="Hamish - Photo by Blue Ridge Creative"
            position="right"
            href="https://www.blueridgeprairie.studio/" />

    </div>

</div>

{{-- End Hero --}}

@endsection


@section('content')


{{-- Featured Event --}}
@if ($featuredEvent)

    <section class="px-6 pt-[88px] pb-12 md:px-8 md:pb-16">

        <div class="grid grid-cols-12 overflow-hidden rounded-md bg-sp-limestone">

            {{-- Featured Image --}}
            <div class="col-span-12 md:col-span-6">

                @if ($featuredEvent->featured_image_path)

                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($featuredEvent->featured_image_path) }}"
                        alt="{{ $featuredEvent->featured_image_alt ?? $featuredEvent->title }}"
                        class="block aspect-[2/1] w-full object-cover md:aspect-auto md:h-full"
                    >

                @else

                    <div class="flex aspect-[2/1] items-center justify-center bg-sp-warmIvory md:h-full">

                        <span class="font-display text-2xl text-sp-slate">
                            Southern Plains Sport Dog Club
                        </span>

                    </div>

                @endif

            </div>
            {{-- End Featured Image --}}


            {{-- Featured Details --}}
            <div class="col-span-12 flex flex-col justify-center p-6 md:col-span-6 md:p-8">

                @php
                    $featuredType = match ($featuredEvent->type) {
                        'dog_sports' => 'Dog Sports',
                        'training' => 'Training',
                        'workshop' => 'Workshop',
                        'class' => 'Class',
                        'community' => 'Community',
                        default => 'Event',
                    };
                @endphp

                <p class="font-display font-bold text-sm uppercase tracking-wide text-sp-prairieOchre">
                    {{ $featuredType }}
                </p>

                <h2 class="font-sans text-3xl font-semibold leading-tight text-sp-charcoal mt-2">
                    {{ $featuredEvent->title }}
                </h2>


                {{-- Featured Metadata --}}
                <div class="mt-4 space-y-2 text-sm text-sp-slate">

                    <div class="flex items-start gap-2">

                        <x-icons.calendar-range
                            class="mt-0.5 h-4 w-4 shrink-0 text-sp-slate"
                            aria-hidden="true"
                        />

                        <span>

                            @if ($featuredEvent->end_date)

                                {{ $featuredEvent->start_date->format('F j') }}
                                –
                                {{ $featuredEvent->end_date->format('F j, Y') }}

                            @else

                                {{ $featuredEvent->start_date->format('F j, Y') }}

                            @endif

                        </span>

                    </div>


                    @if ($featuredEvent->city || $featuredEvent->state)

                        <div class="flex items-start gap-2">

                            <x-icons.map-pin
                                class="mt-0.5 h-4 w-4 shrink-0 text-sp-slate"
                                aria-hidden="true"
                            />

                            <span>

                                @if ($featuredEvent->is_private_location)

                                    {{ $featuredEvent->city }}, {{ $featuredEvent->state }}

                                @else

                                    {{ $featuredEvent->venue_name
                                        ? $featuredEvent->venue_name . ', '
                                        : ''
                                    }}

                                    {{ $featuredEvent->city }}, {{ $featuredEvent->state }}

                                @endif

                            </span>

                        </div>

                    @endif


                    @if ($featuredEvent->registration_status !== 'not_required')

                        @php
                            $registrationLabel = match (
                                $featuredEvent->effective_registration_status
                            ) {
                                'open' => 'Registration Open',
                                'coming_soon' => 'Registration Coming Soon',
                                'closed' => 'Registration Closed',
                                default => 'Registration',
                            };
                        @endphp

                        <div class="flex items-start gap-2">

                            <x-icons.calendar-plus
                                class="mt-0.5 h-4 w-4 shrink-0 text-sp-slate"
                                aria-hidden="true"
                            />

                            <span>
                                {{ $registrationLabel }}
                            </span>

                        </div>

                    @endif

                </div>
                {{-- End Featured Metadata --}}


                @if ($featuredEvent->short_description)

                    <p class="body text-sp-slate mt-5">
                        {{ $featuredEvent->short_description }}
                    </p>

                @endif


                <div class="mt-6">

                    <a
                        href="{{ route('public-v2.events.show', $featuredEvent->slug) }}"
                        class="inline-flex items-center gap-2 rounded-md bg-sp-prairieGreen px-4 py-2 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-sp-prairieOchre"
                    >

                        View Event

                        <x-icons.move-right
                            class="h-4 w-4"
                            aria-hidden="true"
                        />

                    </a>

                </div>

            </div>
            {{-- End Featured Details --}}

        </div>

    </section>

@endif
{{-- End Featured Event --}}


{{-- Upcoming Events --}}
<section
    id="upcoming"
    class="px-6 pb-16 md:px-8 md:pb-24">

    <div class="flex flex-wrap items-end justify-between gap-4">

        <div>

            <p class="font-display font-bold text-2xl text-sp-burntClay">
                Upcoming
            </p>

            <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-2">
                What’s Coming Next
            </h2>

        </div>


        {{-- Full Archive Link --}}
        <a
            href="{{ route('public-v2.events.index') }}"
            class="learn-more-link text-sp-prairieGreen"
        >
            View All Events

            <x-icons.move-right />

        </a>

    </div>


    @if ($upcomingEvents->isNotEmpty())

        <div class="mt-6 space-y-2">

            @foreach ($upcomingEvents as $event)

                @php
                    $eventType = match ($event->type) {
                        'dog_sports' => 'Dog Sports',
                        'training' => 'Training',
                        'workshop' => 'Workshop',
                        'class' => 'Class',
                        'community' => 'Community',
                        default => 'Event',
                    };
                @endphp


                <article
                    class="group grid grid-cols-12 items-center gap-4 rounded-md px-4 py-6 transition-colors duration-200 hover:bg-sp-limestone md:gap-6 md:px-6"
                >

                    {{-- Date --}}
                    <div class="col-span-3 md:col-span-1">

                        <div class="text-left">

                            <p class="font-display font-bold text-lg uppercase text-sp-slate">
                                {{ $event->start_date->format('M') }}
                            </p>

                            <p class="font-sans text-4xl font-semibold leading-none text-sp-prairieGreen">
                                {{ $event->start_date->format('d') }}
                            </p>

                            <p class="mt-1 text-sm text-sp-slate">
                                {{ $event->start_date->format('Y') }}
                            </p>

                        </div>

                    </div>
                    {{-- End Date --}}


                    {{-- Image --}}
                    <div class="col-span-9 md:col-span-4">

                        @if ($event->featured_image_path)

                            <img
                                src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($event->featured_image_path) }}"
                                alt="{{ $event->featured_image_alt ?? $event->title }}"
                                class="block aspect-[2/1] w-full rounded-md object-cover"
                            >

                        @else

                            <div class="flex aspect-[2/1] w-full items-center justify-center rounded-md bg-sp-warmIvory">

                                <span class="font-display text-xl text-sp-slate">
                                    Southern Plains
                                </span>

                            </div>

                        @endif

                    </div>
                    {{-- End Image --}}


                    {{-- Event Details --}}
                    <div class="col-span-12 md:col-span-5">

                        <p class="font-display font-bold text-sm uppercase tracking-wide text-sp-prairieOchre">
                            {{ $eventType }}
                        </p>

                        <h3 class="font-sans text-xl font-semibold leading-tight text-sp-charcoal mt-1">
                            {{ $event->title }}
                        </h3>


                        <div class="mt-3 space-y-1 text-sm text-sp-slate">

                            <div class="flex items-start gap-2">

                                <x-icons.signpost
                                    class="mt-0.5 h-4 w-4 shrink-0"
                                    aria-hidden="true"
                                />

                                <span>
                                    {{ $event->city }}, {{ $event->state }}
                                </span>

                            </div>

                        </div>


                        @if ($event->short_description)

                            <p class="body text-sp-slate mt-3">
                                {{ $event->short_description }}
                            </p>

                        @endif

                    </div>
                    {{-- End Event Details --}}


                    {{-- Details Link --}}
                    <div class="col-span-12 md:col-span-2 md:text-right">

                        <a
                            href="{{ route('public-v2.events.show', $event->slug) }}"
                            class="inline-flex items-center gap-2 rounded-md border border-sp-prairieGreen px-4 py-2 text-sm font-semibold text-sp-prairieGreen transition-colors hover:bg-sp-prairieGreen hover:text-sp-warmIvory"
                        >

                            Details

                            <x-icons.move-right
                                class="h-4 w-4"
                                aria-hidden="true"
                            />

                        </a>

                    </div>
                    {{-- End Details Link --}}

                </article>

            @endforeach

        </div>

    @else

        <div class="mt-6 rounded-md bg-sp-limestone px-6 py-10 text-center">

            <h3 class="font-sans text-2xl font-semibold text-sp-charcoal">
                Nothing scheduled right now.
            </h3>

            <p class="body text-sp-slate mt-3 max-w-xl mx-auto">
                We’re always working on what’s next. Check back soon for upcoming events, classes, workshops, and opportunities to play.
            </p>

        </div>

    @endif

</section>
{{-- End Upcoming Events --}}


{{-- Find Your Thing --}}
<section class="bg-sp-sage px-6 py-12 md:px-8 md:py-16">

    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12">

            <p class="font-display font-bold text-sm uppercase tracking-wide text-sp-burntClay">
                Find Your Thing
            </p>

            <h2 class="font-sans text-2xl font-semibold text-sp-charcoal mt-2">
                Not Sure What You’re Looking For?
            </h2>

        </div>

    </div>

    <div class="mt-6 grid grid-cols-12 gap-4">

        {{-- Dog Sports --}}
        <a
            href="{{ route('public-v2.dog-sports') }}"
            class="col-span-12 rounded-md bg-sp-limestone p-5 transition-transform hover:-translate-y-0.5 md:col-span-4"
        >

            <x-icons.trophy
                class="h-7 w-7 text-sp-prairieGreen"
                aria-hidden="true"
            />

            <h3 class="font-sans text-lg font-semibold text-sp-charcoal mt-4">
                Dog Sports
            </h3>

            <p class="body text-sp-slate mt-2">
                Explore NASDA and other ways to play, train, and compete with your dog.
            </p>

            <span class="mt-4 inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wide text-sp-prairieGreen">

                Explore Dog Sports

                <x-icons.move-right
                    class="h-4 w-4"
                    aria-hidden="true"
                />

            </span>

        </a>


        {{-- Training --}}
        <a
            href="{{ route('public-v2.training') }}"
            class="col-span-12 rounded-md bg-sp-limestone p-5 transition-transform hover:-translate-y-0.5 md:col-span-4"
        >

            <x-icons.calendar-plus
                class="h-7 w-7 text-sp-prairieGreen"
                aria-hidden="true"
            />

            <h3 class="font-sans text-lg font-semibold text-sp-charcoal mt-4">
                Training
            </h3>

            <p class="body text-sp-slate mt-2">
                Find training opportunities designed to build better dog and handler teams.
            </p>

            <span class="mt-4 inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wide text-sp-prairieGreen">

                Explore Training

                <x-icons.move-right
                    class="h-4 w-4"
                    aria-hidden="true"
                />

            </span>

        </a>


        {{-- Learn --}}
        <a
            href="{{ route('public-v2.learn.index') }}"
            class="col-span-12 rounded-md bg-sp-limestone p-5 transition-transform hover:-translate-y-0.5 md:col-span-4"
        >

            <x-icons.book-open
                class="h-7 w-7 text-sp-prairieGreen"
                aria-hidden="true"
            />

            <h3 class="font-sans text-lg font-semibold text-sp-charcoal mt-4">
                Learn
            </h3>

            <p class="body text-sp-slate mt-2">
                Browse articles, guides, and resources to help you and your dog keep growing.
            </p>

            <span class="mt-4 inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wide text-sp-prairieGreen">

                Explore Learn

                <x-icons.move-right
                    class="h-4 w-4"
                    aria-hidden="true"
                />

            </span>

        </a>

    </div>

</section>
{{-- End Find Your Thing --}}


@endsection
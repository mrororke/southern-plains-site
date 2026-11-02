@extends('public-v2.layouts.app')


@section('meta_title', 'Events Archive | Southern Plains Sport Dog Club')

@section('meta_description', 'Browse upcoming and past events from Southern Plains Sport Dog Club, including dog sports, workshops, classes, training, and community events.')

@section('og_title', 'Events Archive | Southern Plains Sport Dog Club')

@section('og_description', 'Browse upcoming and past events from Southern Plains Sport Dog Club.')

@section('og_image', asset('images/og/default.jpg'))

@section('canonical_url', url('/v2/events/archive'))


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
                href="#past-events"
                class="btn-primary-outline">
                Browse Past Events
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

{{-- Archive Content --}}
<section
    class="grid grid-cols-12 gap-6 px-6 pb-16 md:px-8 md:pb-24">

    {{-- Main Archive Content --}}
    <div class="col-span-12 md:col-span-9">

        {{-- Upcoming Events --}}
        <div id="upcoming">

            <p class="font-display font-bold text-2xl text-sp-burntClay">
                Upcoming
            </p>

            <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-2">
                What's Coming Next
            </h2>


            @if ($upcomingEvents->isNotEmpty())

                <div class="mt-10 space-y-12">

                    @foreach ($upcomingByCategory as $type => $events)

                        <section
                            id="{{ \Illuminate\Support\Str::slug($eventCategories[$type]) }}"
                            class="scroll-mt-32">

                            <h3 class="font-sans text-2xl font-semibold text-sp-charcoal">
                                {{ $eventCategories[$type] }}
                            </h3>


                            <div class="mt-5 space-y-2">

                                @foreach ($events as $event)

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


                                        {{-- Event Details --}}
                                        <div class="col-span-12 md:col-span-5">

                                            <p class="font-display font-bold text-sm uppercase tracking-wide text-sp-prairieOchre">
                                                {{ $eventType }}
                                            </p>

                                            <h4 class="font-sans text-xl font-semibold leading-tight text-sp-charcoal mt-1">
                                                {{ $event->title }}
                                            </h4>


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

                                    </article>

                                @endforeach

                            </div>

                        </section>

                    @endforeach

                </div>

            @else

                <div class="mt-8 rounded-md bg-sp-limestone px-6 py-10 text-center">

                    <h3 class="font-sans text-2xl font-semibold text-sp-charcoal">
                        Nothing scheduled right now.
                    </h3>

                    <p class="body text-sp-slate mt-3 max-w-xl mx-auto">
                        We’re always working on what’s next. Check back soon for upcoming events, classes, workshops, and opportunities to play.
                    </p>

                </div>

            @endif

        </div>
        {{-- End Upcoming Events --}}


        {{-- Past Events --}}
        <section
            id="past-events"
            class="mt-20 scroll-mt-32">

            <p class="font-display font-bold text-2xl text-sp-burntClay">
                Past Events
            </p>

            <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-2">
                Where We've Been
            </h2>


            @if ($pastEvents->isNotEmpty())

                <div class="mt-10 space-y-2">

                    @foreach ($pastEvents as $event)

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

                                    <p class="font-sans text-4xl font-semibold leading-none text-sp-slate">
                                        {{ $event->start_date->format('d') }}
                                    </p>

                                    <p class="mt-1 text-sm text-sp-slate">
                                        {{ $event->start_date->format('Y') }}
                                    </p>

                                </div>

                            </div>


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


                            {{-- Event Details --}}
                            <div class="col-span-12 md:col-span-5">

                                <p class="font-display font-bold text-sm uppercase tracking-wide text-sp-slate">
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


                            {{-- Details Link --}}
                            <div class="col-span-12 md:col-span-2 md:text-right">

                                <a
                                    href="{{ route('public-v2.events.show', $event->slug) }}"
                                    class="inline-flex items-center gap-2 rounded-md border border-sp-slate/40 px-4 py-2 text-sm font-semibold text-sp-slate transition-colors hover:bg-sp-slate hover:text-sp-warmIvory"
                                >

                                    View Event

                                    <x-icons.move-right
                                        class="h-4 w-4"
                                        aria-hidden="true"
                                    />

                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                <p class="body text-sp-slate mt-8">
                    No past events are currently available.
                </p>

            @endif

        </section>
        {{-- End Past Events --}}

    </div>
    {{-- End Main Archive Content --}}


    {{-- Archive Navigation --}}
    <aside class="col-span-12 md:col-span-3">

        <x-public-v2.events-navigation
    :event-categories="$eventCategories"
    :upcoming-by-category="$upcomingByCategory"
    :has-past-events="$pastEvents->isNotEmpty()"
/>

    </aside>
    {{-- End Archive Navigation --}}

</section>
{{-- End Archive Content --}}


@endsection

{{-- Events Navigation Active Section Tracking --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const navLinks = document.querySelectorAll(
            '[data-events-nav]'
        );

        if (!navLinks.length) {
            return;
        }

        const eventSections = Array.from(navLinks)
            .map(link => {
                const id = link
                    .getAttribute('href')
                    ?.substring(1);

                return id
                    ? document.getElementById(id)
                    : null;
            })
            .filter(Boolean);

        if (!eventSections.length) {
            return;
        }

        const setActiveSection = (id) => {

            navLinks.forEach(link => {

                const isActive =
                    link.getAttribute('href') === `#${id}`;

                link.classList.toggle(
                    'is-active',
                    isActive
                );

                if (isActive) {

                    link.setAttribute(
                        'aria-current',
                        'location'
                    );

                } else {

                    link.removeAttribute(
                        'aria-current'
                    );

                }

            });

        };

        const observer = new IntersectionObserver(
            (entries) => {

                const visibleSections = entries
                    .filter(entry => entry.isIntersecting)
                    .sort(
                        (a, b) =>
                            a.boundingClientRect.top -
                            b.boundingClientRect.top
                    );

                if (visibleSections.length) {

                    setActiveSection(
                        visibleSections[0].target.id
                    );

                }

            },
            {
                rootMargin: '-20% 0px -65% 0px',
                threshold: 0,
            }
        );

        eventSections.forEach(section => {
            observer.observe(section);
        });

        const firstSection = eventSections[0];

        if (firstSection) {
            setActiveSection(firstSection.id);
        }

    });
</script>
{{-- End Events Navigation Active Section Tracking --}}
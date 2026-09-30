@extends('public-v2.layouts.app')

@section('meta_title', 'Dog Training & Dog Sports in Oklahoma | Southern Plains Sport Dog Club')
@section('meta_description', 'Positive reinforcement dog training, dog sports, events, and resources in Oklahoma. Play, train, and grow with Southern Plains Sport Dog Club.')
@section('og_title', 'Do Great Things With Your Dog | Southern Plains Sport Dog Club')
@section('og_description', 'Positive reinforcement training, dog sports, events, and a community built around doing more with your dog.')
@section('og_image', asset('images/og/home.jpg'))
@section('canonical_url', 'https://southernplains.dog/')

@section('structured_data')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Southern Plains Sport Dog Club, LLC",
        "url": "https://southernplains.dog/",
        "logo": "https://southernplains.dog/images/logo.svg",
        "email": "southernplainssportdogclub@gmail.com",
        "areaServed": {
            "@type": "AdministrativeArea",
            "name": "Northeast Oklahoma"
        },
        "sameAs": [
            "https://www.facebook.com/southernplainsportdogclub",
            "https://www.instagram.com/southernplainssdc/",
            "https://www.youtube.com/@southernplainssportdogs"
        ]
    }
</script>
@endsection

@section('content')

{{-- Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 pt-8">

    <div class="col-span-12 md:col-span-5 md:pr-0 pl-8 pr-8">

        <p class="text-eyebrow">
            Dog Sports
        </p>

        <h1 class="text-hero">
            Your Dog was Made to do Stuff.
            </span>
        </h1>

        <div class="hl-break">
            <hr>
        </div>

        <p class="body-large">
            Dogs sniff. Search. Chase. Explore. Solve problems. Dog sports give those natural instincts somewhere to go — and give you something pretty great to do together.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 py-6">

            <a
                href="#discover"
                class="btn-primary">
                Discover Dog Sports
            </a>

            <a
                href="{{ route('public-v2.events.index') }}"
                class="btn-primary-outline">
                View Upcoming Events
            </a>

        </div>

    </div>

    <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">

        <img
            class="w-full h-full"
            src="{{ asset('images/headers/header-dog-sports.png') }}"
            alt="Brindle and white English bulldog trotting through OKlahoma wildflowers.">

        <x-public-v2.image-registration
            text="Hazel, Photo by Blue Ridge Creative"
            position="right"
            href="https://www.blueridgeprairie.studio/" />
    </div>

</div>

{{-- Start Where You Are --}}
<section class="grid grid-cols-12 gap-6 px-6 py-12 md:px-8 md:py-16 bg-sp-warmIvory">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-6">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Start Where You Are
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            You Don’t Need a Sport Dog.<br class="hidden md:block">
            You Need Your Dog.
        </h2>

        <p class="body text-sp-slate mt-4 max-w-xl">
            Dog sports aren’t just for certain breeds, highly trained dogs, or experienced competitors. They’re for any dog and any person who want to build a stronger partnership, and have a blast doing it.
        </p>

    </div>

    {{-- Principles --}}
    <div class="col-span-12 grid grid-cols-2 mt-4 md:col-span-6 md:grid-cols-4 md:mt-0 self-center">

        {{-- Fun --}}
        <div class="p-6 border-r border-b md:border-b-0 border-sp-warmStone text-center">

            <x-icons.balloon
                class="w-10 h-10 md:w-12 md:h-12 text-sp-prairieGreen mx-auto" />

            <p class="body-small text-sp-slate mt-4">
                Fun for dogs<br>
                and people
            </p>

        </div>

        {{-- Confidence --}}
        <div class="p-6 border-b md:border-b-0 md:border-r border-sp-warmStone text-center">

            <x-icons.paw-print
                class="w-10 h-10 md:w-12 md:h-12 text-sp-prairieGreen mx-auto" />

            <p class="body-small text-sp-slate mt-4">
                Build confidence<br>
                and connection
            </p>

        </div>

        {{-- Inclusive --}}
        <div class="p-6 border-r border-sp-warmStone text-center">

            <x-icons.users
                class="w-10 h-10 md:w-12 md:h-12 text-sp-prairieGreen mx-auto" />

            <p class="body-small text-sp-slate mt-4">
                All breeds.<br>
                All sizes.
            </p>

        </div>

        {{-- Start Small --}}
        <div class="p-6 text-center">

            <x-icons.heart
                class="w-10 h-10 md:w-12 md:h-12 text-sp-prairieGreen mx-auto" />

            <p class="body-small  text-sp-slate mt-4">
                Start small.<br>
                Go at your pace.
            </p>

        </div>

    </div>

</section>
{{-- End Start Where You Are --}}

{{-- Find Your Game --}}
<section class="grid grid-cols-12 gap-6 px-6 py-12 md:px-8 md:py-16 bg-sp-warmIvory">

    {{-- Section Intro --}}
    <div class="col-span-12 md:col-span-9">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Find Your Game
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            What Do You Want to Try?
        </h2>

    </div>

    {{-- Supporting Copy --}}
<div class="col-span-12 md:col-span-3 md:flex md:justify-end">

    <p class="body-small font-semibold text-sp-slate md:text-right md:max-w-64">
        Explore dog sports, find your game,<br class="hidden md:block">
        and discover something new.
    </p>

</div>

    {{--
        Featured Dog Sports Content

        TODO:
        Pull published Learn articles assigned to the Dog Sports category.
        When multiple qualifying articles exist, display these features as
        a slider/carousel. For now, NASDA is the single static feature.
    --}}
    <div class="col-span-12 border border-sp-warmStone rounded-md mt-2">

        <div class="grid grid-cols-12 gap-6 px-6 py-10 md:px-0 md:py-20">

            {{-- Empty Column --}}
            <div class="hidden md:block md:col-span-1"></div>

            {{-- Featured Content --}}
            <div class="col-span-12 md:col-span-5 flex items-center">

                <div>

                    <span class="inline-block bg-sp-prairieOchre text-sp-warmIvory text-xs uppercase rounded-md px-3 py-2">
                        Featured Sport
                    </span>

                    <h3 class="font-display text-6xl md:text-7xl text-sp-charcoal mt-8">
                        NASDA
                    </h3>

                    <p class="body-small text-sp-slate uppercase mt-2">
                        North American Sport Dog Association
                    </p>

                    <p class="body-large text-sp-slate mt-8">
                        From searching for lost objects to trailing and locating rats, NASDA lets dogs use their noses, independence, and problem solving skills in exciting and rewarding ways.
                    </p>

                    <a
                        href="#"
                        class="learn-more-link text-sp-prairieOchre mt-4">
                        Learn More About NASDA
                        <x-icons.move-right />
                    </a>

                </div>

            </div>

            {{-- Featured Image --}}
            <div class="col-span-12 md:col-span-5 flex items-center mt-4 md:mt-0">

                <div class="relative w-full">

                    <img
                        src="{{ asset('images/learn/what-is-nasda/featured.jpg') }}"
                        alt="Hamish, a black and white Sheltie, investigating a NASDA quarry box."
                        class="w-full aspect-[16/9] object-cover rounded-md">

                    <x-public-v2.image-registration
                        text="Hamish, Photo by Blue Ridge Creative"
                        position="bottom"
                        compact
                        href="https://www.blueridgeprairie.studio/" />

                </div>

            </div>

            {{-- Empty Column --}}
            <div class="hidden md:block md:col-span-1"></div>

        </div>

    </div>

</section>
{{-- End Find Your Game --}}

{{-- Play With Us --}}
<section class="grid grid-cols-12 gap-6 px-6 py-12 md:px-8 md:py-16 bg-sp-prairieGreen text-sp-warmIvory">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-4 md:pr-6">

        <p class="font-display font-bold text-2xl text-sp-warmIvory">
            Get Involved
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-warmIvory mt-3">
            Play With Us.
        </h2>

        <p class="body-large text-sp-warmIvory mt-4">
            Southern Plains offers opportunities for every stage of your dog sports journey.
        </p>

        <a
            href="{{ route('public-v2.events.index') }}"
            class="btn-light w-full md:w-auto mt-6">
            View Upcoming Events
        </a>

    </div>

    {{-- Opportunities --}}
    <div class="col-span-12 grid grid-cols-2 mt-4 md:col-span-8 md:grid-cols-4 md:mt-0">

        {{-- NASDA Trials --}}
        <div class="p-6 border-r border-b md:border-b-0 border-sp-warmIvory/40 md:pt-0 md:pb-0 md:pl-0 md:pr-6">

            <x-icons.calendar-days
                class="w-10 h-10 text-sp-warmIvory mb-6" />

            <h3 class="font-sans font-semibold text-xl text-sp-warmIvory">
                NASDA Trials
            </h3>

            <p class="body-small-light mt-3">
                Earn titles and celebrate your team’s hard work in a supportive competitive setting.
            </p>

        </div>

        {{-- Training Days --}}
        <div class="p-6 border-b md:border-b-0 md:border-r border-sp-warmIvory/40 md:py-0">

            <x-icons.route
                class="w-10 h-10 text-sp-warmIvory mb-6" />

            <h3 class="font-sans font-semibold text-xl text-sp-warmIvory">
                Training Days
            </h3>

            <p class="body-small-light mt-3">
                Practice and learn in a fun, low-pressure environment with like-minded handlers.
            </p>

        </div>

        {{-- Sport Dog League --}}
        <div class="p-6 border-r border-sp-warmIvory/40 md:py-0">

            <x-icons.medal
                class="w-10 h-10 text-sp-warmIvory mb-6" />

            <h3 class="font-sans font-semibold text-xl text-sp-warmIvory">
                Sport Dog League
            </h3>

            <p class="body-small-light mt-3">
                Earn titles and celebrate your team’s hard work in a supportive competitive setting.
            </p>

        </div>

        {{-- First Trial Prep --}}
        <div class="p-6 md:pt-0 md:pb-0 md:pl-6 md:pr-0">

            <x-icons.book-open
                class="w-10 h-10 text-sp-warmIvory mb-6" />

            <h3 class="font-sans font-semibold text-xl text-sp-warmIvory">
                First Trial Prep
            </h3>

            <p class="body-small-light mt-3">
                Resources and mentorship to help you feel confident and ready.
            </p>

        </div>

    </div>

</section>
{{-- End Play With Us --}}

{{-- Southern Plains Sport Dog League --}}
<section class="grid grid-cols-12 gap-8 px-6 py-12 md:gap-6 md:px-8 md:py-16 bg-sp-warmIvory">

    {{-- Image --}}
    <div class="col-span-12 md:col-span-4">

        <div class="relative">

            <img
                src="{{ asset('images/dog-sports/league.jpg') }}"
                alt="Hamish, a black and white Sheltie, finding a shed antler."
                class="w-full aspect-[4/3] object-cover">

            <x-public-v2.image-registration
                text="Hamish, Photo by Blue Ridge Creative"
                position="bottom"
                compact
                href="https://www.blueridgeprairie.studio/" />

        </div>

    </div>

    {{-- League Intro --}}
    <div class="col-span-12 md:col-span-5 flex items-center">

        <div>

            <p class="font-display font-bold text-2xl text-sp-burntClay">
                More Ways to Play
            </p>

            <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
                Southern Plains<br class="hidden md:block">
                Sport Dog League
            </h2>

            <p class="body-large text-sp-slate mt-4">
                A year-long league for handlers and dogs of all experience levels. Earn points, track your progress, and celebrate at the end of season party.
            </p>

            <a
                href="#"
                class="btn-secondary w-full md:w-auto mt-6">
                Explore the League
            </a>

        </div>

    </div>

    {{-- League Features --}}
    <div class="col-span-12 md:col-span-3 flex items-center">

        <div class="w-full bg-sp-limestone rounded-md p-6">

            <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-1">

                <li class="flex items-center gap-4">

                    <x-icons.dog
                        class="w-8 h-8 shrink-0 text-sp-charcoal" />

                    <span class="body-small text-sp-slate">
                        Open to handlers and dogs of all levels
                    </span>

                </li>

                <li class="flex items-center gap-4">

                    <x-icons.trophy
                        class="w-8 h-8 shrink-0 text-sp-charcoal" />

                    <span class="body-small text-sp-slate">
                        Earn points at League Days throughout the year.
                    </span>

                </li>

                <li class="flex items-center gap-4">

                    <x-icons.chart-column-big
                        class="w-8 h-8 shrink-0 text-sp-charcoal" />

                    <span class="body-small text-sp-slate">
                        Season standings and rewards
                    </span>

                </li>

                <li class="flex items-center gap-4">

                    <x-icons.handshake
                        class="w-8 h-8 shrink-0 text-sp-charcoal" />

                    <span class="body-small text-sp-slate">
                        Community and friendly competition
                    </span>

                </li>

            </ul>

        </div>

    </div>

</section>
{{-- End Southern Plains Sport Dog League --}}






@endsection
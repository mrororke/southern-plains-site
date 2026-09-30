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
            Your dog was Made to do Stuff.
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
                Discovery Dog Sports
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
<section class="grid grid-cols-12 gap-6 px-8 py-16 bg-sp-warmIvory">

    {{-- Intro --}}
    <div class="col-span-6">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Start Where You Are
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            You Don’t Need a Sport Dog.<br>
            You Need Your Dog.
        </h2>

        <p class="body mt-4 max-w-xl">
            Dog sports aren’t just for certain breeds, highly trained dogs, or experienced competitors. They’re for any dog and any person who want to build a stronger partnership, and have a blast doing it.
        </p>

    </div>

    {{-- Principles --}}
    <div class="col-span-6 grid grid-cols-4 self-center">

        {{-- Fun --}}
        <div class="px-6 text-center border-r border-sp-warmStone">

            <x-icons.balloon
            class="w-10 h-10 md:w-12 md:h-12 text-sp-prairieGreen  mx-auto" />

            <p class="body-small mt-4">
                Fun for dogs<br>
                and people
            </p>

        </div>

        {{-- Confidence --}}
        <div class="px-6 text-center border-r border-sp-warmStone">

           <x-icons.paw-print
            class="w-10 h-10 md:w-12 md:h-12 text-sp-prairieGreen mx-auto" />

            <p class="body-small mt-4">
                Build confidence<br>
                and connection
            </p>

        </div>

        {{-- Inclusive --}}
        <div class="px-6 text-center border-r border-sp-warmStone">

            <x-icons.users
            class="w-10 h-10 md:w-12 md:h-12 text-sp-prairieGreen  mx-auto" />

            <p class="body-small mt-4">
                All breeds.<br>
                All sizes.
            </p>

        </div>

        {{-- Start Small --}}
        <div class="px-6 text-center">

            <x-icons.heart
            class="w-10 h-10 md:w-12 md:h-12 text-sp-prairieGreen  mx-auto" />

            <p class="body-small mt-4">
                Start small.<br>
                Go at your pace.
            </p>

        </div>

    </div>

</section>
{{-- End Start Where You Are --}}

{{-- Find Your Game --}}
<section class="grid grid-cols-12 gap-6 px-8 py-16 bg-sp-warmIvory">

    {{-- Section Intro --}}
    <div class="col-span-9">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Find Your Game
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            What Do You Want to Try?
        </h2>

    </div>

    <div class="col-span-3 flex items-end justify-end">

        <p class="body-small font-semibold text-sp-prairieGreen text-right max-w-64">
            Explore dog sports, find your game,<br>
            and discover something new.
        </p>

    </div>


    {{--
        Featured Dog Sports Content

        TODO :
        Pull published Learn articles assigned to the Dog Sports category.
        When multiple qualifying articles exist, display these features as
        a slider/carousel. For now, NASDA is the single static feature.
    --}}
    <div class="col-span-12 border border-sp-warmStone rounded-md mt-2">

        <div class="grid grid-cols-12 gap-6 px-16 py-20">

            {{-- Featured Content --}}
            <div class="col-span-5 flex items-center">

                <div>

                    <span class="inline-block bg-sp-prairieOchre text-sp-warmIvory text-xs uppercase rounded-md px-3 py-2">
                        Featured Sport
                    </span>

                    <h3 class="font-display text-7xl text-sp-charcoal mt-8">
                        NASDA
                    </h3>

                    <p class="body-small uppercase mt-2">
                        North American Sport Dog Association
                    </p>

                    <p class="body-large mt-8">
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
            <div class="col-span-1"></div>

            <div class="col-span-6 flex items-center">

                <div class="relative w-full">

                    <img
                        src="{{ asset('images/learn/what-is-nasda/featured.jpg') }}"
                        alt="Black and white dog investigating a NASDA quarry box."
                        class="w-full aspect-[16/9] object-cover rounded-md">

                </div>

            </div>

        </div>

    </div>

</section>
{{-- End Find Your Game --}}




@endsection
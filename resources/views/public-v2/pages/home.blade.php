@extends('public-v2.layouts.app')

@section('content')

{{-- Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 pt-8">

    <div class="col-span-12 md:col-span-5 md:pr-0 pl-8 pr-8">

        <h3 class="text-eyebrow">
            Play. Train. Grow
        </h3>

        <h1 class="text-hero">
            More Ways to Do Great Things<br class="hidden md:block">
            <span class="text-hero-emphasis">
                With Your Dog.
            </span>
        </h1>

        <div class="hl-break">
            <hr>
        </div>

        <p class="body-large">
            Positive reinforcement training. Dog sports. Real community.
            We’re here to help you and your dog learn, play,
            and thrive — together.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 py-6">

            <a
                href="#possibilities"
                class="btn-primary">
                Explore What's Possible
            </a>

            <a
                href="{{ route('public-v2.events.index') }}"
                class="btn-primary-outline">
                View Events
            </a>

        </div>

    </div>

    <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">

        <img
            class="w-full h-full"
            src="{{ asset('images/headers/header-home.png') }}"
            alt="Black and white Sheltie standing among wildflowers on the Oklahoma prairie.">

        <x-public-v2.image-registration
            text="Hamish, Photo by Blue Ridge Creative"
            position="right" />
    </div>

</div>


{{-- Begin 3 cards --}}


<div class="grid grid-cols-12 gap-y-10 md:gap-y-0 py-[64px] px-8">

    <div class="col-span-12 md:col-span-4 gap-4 flex">
        <div>
            <x-icons.dog class="text-sp-prairieGreen w-24 h-24" />
        </div>
        <div>
            <h4 class="font-display font-bold text-2xl text-sp-prairieGreen">
                Let Dogs Be Dogs.
            </h4>
            <h3 class="font-sans text-4xl text-sp-charcoal uppercase">
                Play
            </h3>
            <p class="body">
                Create experiences that tap into natural instincts, spark joy, and build confidence.
            </p>
            <a href="#" class="learn-more-link text-sp-prairieGreen">
                Learn More
                <x-icons.move-right />
            </a>
        </div>
    </div>

    <div class="col-span-12 md:col-span-4 gap-4 flex">
        <div>
            <x-icons.award class="text-sp-prairieOchre w-24 h-24" />
        </div>
        <div>
            <h4 class="font-display font-bold text-2xl text-sp-prairieOchre">
                Build Better Partnerships.
            </h4>
            <h3 class="font-sans text-4xl text-sp-charcoal uppercase">
                Train
            </h3>
            <p class="body">
                Positive methods that strengthen communication, skills, and trust.
            </p>
            <a href="#" class="learn-more-link text-sp-prairieOchre">
                Learn More
                <x-icons.move-right />
            </a>
        </div>
    </div>

    <div class="col-span-12 md:col-span-4 gap-4 flex">
        <div>
            <x-icons.sprout class="text-sp-burntClay w-24 h-24" />
        </div>
        <div>
            <h4 class="font-display font-bold text-2xl text-sp-burntClay">
                Celebrate Every Victory.
            </h4>
            <h3 class="font-sans text-4xl text-sp-charcoal uppercase">
                Grow
            </h3>
            <p class="body">
                From first steps to new titles, we’re here to support your journey together.
            </p>
            <a href="#" class="learn-more-link text-sp-burntClay">
                Learn More
                <x-icons.move-right />
            </a>
        </div>
    </div>

</div>

<!-- End of 3-Up -->


<div class="grid grid-cols-12 py-8 px-8 gap-8">
    <div class="col-span-12 md:col-span-6 hazel-bg relative rounded-md p-8">

        <div class="nasda-feature-box">
            <h4 class="font-display font-bold text-2xl text-sp-burntClay">
                Dog Sports 101
            </h4>

            <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
                What Is NASDA, Anyway?
            </h2>

            <p class="body">
                From finding lost items to searching for rats, NASDA gives dogs and their
                handlers some wonderfully different ways to play together. Here’s what
                the sport looks like, how trials work, and what to expect when you give it a try.
            </p>

            <a href="#" class="learn-more-link text-sp-prairieOchre py-4">
                Learn More
                <x-icons.move-right />
            </a>
        </div>

        <x-public-v2.image-registration
            text="Hazel, Photo by Blue Ridge Creative"
            position="bottom" />
    </div>
    <div class="col-span-12 md:col-span-6">

        {{-- Section Header --}}
        <div class="flex items-center justify-between mb-6">

            <h2 class="font-sans text-3xl font-semibold text-sp-charcoal uppercase">
                Upcoming Events
            </h2>

            <a
                href="{{ route('public-v2.events.index') }}"
                class="learn-more-link">
                View Full Calendar
                <x-icons.move-right />
            </a>

        </div>

        <x-public-v2.event-row
            month="May"
            day="18"
            title="NASDA Trial"
            description="Judged by Melanie O’Rorke"
            location="Claremore, OK" />



    </div>
</div>

<!-- End Events section -->



@endsection
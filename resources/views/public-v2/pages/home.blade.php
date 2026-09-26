@extends('public-v2.layouts.app')

@section('content')


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

        <div class="image-registration image-registration-bottom">

            <x-icons.locate-fixed class="image-registration-mark" />

            <span class="image-registration-line"></span>

            <span class="image-registration-text-bottom">
                Hazel, Photo by Blue Ridge Creative
            </span>

        </div>

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


        {{-- Event Row --}}
        <div class="flex items-start md:items-center border-b border-sp-limestone py-6">

            {{-- Date --}}
            <div class="w-20 md:w-28 shrink-0">

                <div class="font-sans text-xl font-semibold uppercase text-sp-charcoal">
                    May
                </div>

                <div class="font-sans text-6xl text-sp-prairieOchre">
                    18
                </div>

            </div>


            {{-- Event Details --}}
            <div class="flex-1 min-w-0">

                <h3 class="font-sans text-2xl font-semibold uppercase text-sp-charcoal">
                    NASDA Trial
                </h3>

                <p class="mt-1 text-lg text-sp-slate">
                    Judged by Melanie O’Rorke
                </p>

                {{-- Mobile Location --}}
                <div class="mt-3 flex items-center gap-2 text-sp-slate md:hidden">

                    <x-icons.milestone class="w-5 h-5 shrink-0" />

                    <span class="text-sm">
                        Claremore, OK
                    </span>

                </div>

            </div>


            {{-- Desktop Location --}}
            <div class="ml-auto hidden md:flex shrink-0 items-center justify-end gap-3 pl-6 text-sp-slate">

                <x-icons.milestone class="w-5 h-5 shrink-0" />

                <span class="text-sm whitespace-nowrap">
                    Claremore, OK
                </span>

            </div>

        </div>

    </div>
</div>

<!-- End Events section -->



@endsection
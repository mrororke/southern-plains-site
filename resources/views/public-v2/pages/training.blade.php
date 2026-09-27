@extends('public-v2.layouts.app')

@section('content')

{{-- Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 pt-8">
    <div class="col-span-12 mt-8 md:col-span-6 md:mt-0 relative">

        <img
            class="w-full h-full"
            src="{{ asset('images/headers/header-training.png') }}"
            alt="Black and white Sheltie standing near a deer antler, looking up at his handler.">

        <x-public-v2.image-registration
            text="Hamish, Photo by Blue Ridge Creative"
            position="left" />
    </div>

    <div class="col-span-12 md:col-span-6 md:pr-0 pl-8 pr-8">

        <p class="text-eyebrow">
            Southern Plains Training
        </p>

        <h1 class="text-hero">
            Training Should Feel Good on Both Ends of the Leash
        </h1>

        <div class="hl-break">
            <hr>
        </div>

        <p class="body-large">
            Positive reinforcement, clear communication, and plenty of room to have fun. Southern Plains helps you build skills with the dog in front of you—without force, intimidation, or physical correction.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 py-6">

            <a
                href="#possibilities"
                class="btn-primary">
                Explore Training Options
            </a>

            <a
                href="{{ route('public-v2.about') }}"
                class="btn-primary-outline">
                Meet Melanie
            </a>

        </div>

    </div>
</div>
{{-- End Hero --}}

{{-- Train Differently --}}
<section class="grid grid-cols-12 px-8 py-16">

    {{-- Empty Column --}}
    <div class="col-span-1"></div>

    {{-- Icon --}}
    <div class="col-span-1">
        <x-icons.mouse-pointer-click
            class="w-12 h-12 text-sp-prairieGreen" />
    </div>

    {{-- Left Text Area --}}
    <div class="col-span-4">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Train Differently
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
            No Prongs. No Shock.<br class="hidden md:block">
            No Forcing the Issue.
        </h2>

        <p class="body">
            Southern Plains uses positive reinforcement and marker-based training to help dogs understand what we’re asking of them. Clickers are encouraged. Choice matters. And training should build confidence—not make your dog worry about what happens when they get it wrong.
        </p>

    </div>

    {{-- Divider --}}
    <div class="col-span-1 flex justify-center">
        <div class="border-l border-sp-warmStone h-full"></div>
    </div>

    {{-- Right Benefits Area --}}
    <div class="col-span-4 flex flex-col gap-6">

        {{-- Benefit --}}
        <div class="flex gap-6">

            <x-icons.message-circle-more
                class="w-10 h-10 shrink-0 text-sp-prairieOchre" />

            <div>
                <h3 class="font-sans font-semibold text-sp-charcoal">
                    Communicate Clearly
                </h3>

                <p class="body">
                    Make it easy for your dog to understand what earns reinforcement.
                </p>
            </div>

        </div>

        {{-- Benefit --}}
        <div class="flex gap-6">

            <x-icons.shield-check
                class="w-10 h-10 shrink-0 text-sp-prairieOchre" />

            <div>
                <h3 class="font-sans font-semibold text-sp-charcoal">
                    Build Confidence
                </h3>

                <p class="body">
                    Help dogs feel confident enough to try, to think, and to participate.
                </p>
            </div>

        </div>

        {{-- Benefit --}}
        <div class="flex gap-6">

            <x-icons.heart
                class="w-10 h-10 shrink-0 text-sp-prairieOchre" />

            <div>
                <h3 class="font-sans font-semibold text-sp-charcoal">
                    Have Some Fun
                </h3>

                <p class="body">
                    Because the whole point is getting to do more with your dog.
                </p>
            </div>

        </div>

    </div>

    {{-- Empty Column --}}
    <div class="col-span-1"></div>

</section>

{{-- What Do You Want to Do --}}
<section
    id="possibilities"
    class="grid grid-cols-12 px-8 py-16 bg-sp-limestone">

    {{-- Section Intro --}}
    <div class="col-span-12 mb-12">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            What Do You Want to Do With Your Dog?
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">
            Find the Right Path for You
        </h2>

    </div>

    {{-- Cards --}}
    <div class="col-span-12 grid grid-cols-4 gap-6">

       {{-- Card One --}}
<div>

    <img
        class="w-full h-64 object-cover rounded-md"
        src="{{ asset('images/training/training-skills.png') }}"
        alt="Black and white Sheltie looking up at his handler, who is showing empty hands.">

    <h3 class="font-sans font-semibold text-xl text-sp-charcoal mt-4">
        Build Everyday Skills
    </h3>

    <p class="body mt-3">
        Manners, communication, CGC preparation, and stronger foundations for real life.
    </p>

    <a
        href="#"
        class="learn-more-link text-sp-prairieGreen mt-4">
        Learn More
        <x-icons.move-right />
    </a>

</div>

        {{-- Card Two --}}
        <div>
            Column Two
        </div>

        {{-- Card Three --}}
        <div>
            Column Three
        </div>

        {{-- Card Four --}}
        <div>
            Column Four
        </div>

    </div>

</section>




</div>


@endsection
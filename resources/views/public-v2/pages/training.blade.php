@extends('public-v2.layouts.app')

@section('content')

{{-- Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 pt-8">
    <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">

        <img
            class="w-full h-full"
            src="{{ asset('images/headers/header-training.png') }}"
            alt="Black and white Sheltie standing near a deer antler, looking up at his handler.">

        <x-public-v2.image-registration
            text="Hamish, Photo by Blue Ridge Creative"
            position="left" />
    </div>

    <div class="col-span-12 md:col-span-5 md:pr-0 pl-8 pr-8">

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

    {{-- Train Differently --}}
    <section class="grid grid-cols-12 px-8 py-16">

        {{-- Icon --}}
        <div class="col-span-1">
            {{-- Icon --}}
            <x-icons.mouse-pointer-click />
        </div>

        {{-- Left Text Area --}}
        <div class="col-span-5">

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
        <div class="col-span-5">

            {{-- Benefit --}}
            <div class="flex gap-6">

                {{-- Icon --}}

                <div>
                    {{-- Benefit Heading --}}

                    {{-- Benefit Copy --}}
                </div>

            </div>

            {{-- Benefit --}}
            <div class="flex gap-6">

                {{-- Icon --}}

                <div>
                    {{-- Benefit Heading --}}

                    {{-- Benefit Copy --}}
                </div>

            </div>

            {{-- Benefit --}}
            <div class="flex gap-6">

                {{-- Icon --}}

                <div>
                    {{-- Benefit Heading --}}

                    {{-- Benefit Copy --}}
                </div>

            </div>

        </div>

    </section>




</div>


@endsection
@extends('public-v2.layouts.app')

@section('content')

{{-- Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 pt-8">
    <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">

        <img
            class="w-full h-full"
            src="{{ asset('images/headers/header-home.png') }}"
            alt="Black and white Sheltie standing among wildflowers on the Oklahoma prairie.">

        <x-public-v2.image-registration
            text="Hamish, Photo by Blue Ridge Creative"
            position="right" />
    </div>

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

    

</div>


@endsection
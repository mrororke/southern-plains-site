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

    <div class="grid grid-cols-12 pt-8">
        <div class="col-span-12 md:col-span-5 md:pr-0 pl-8 pr-8">
            Left
        </div>
        <div class="col-span-12 md:col-span-5 md:pr-0 pl-8 pr-8">
            Right
        </div>

    </div>


    

</div>


@endsection
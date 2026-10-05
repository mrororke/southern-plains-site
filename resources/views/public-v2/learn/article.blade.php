@extends('public-v2.layouts.app')


@section('hero')

{{-- Learn Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-10">

        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Handler Insights
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            What is NASDA, Anyway?
        </h2>

        {{-- Article Metadata --}}
        <x-public-v2.article-metadata
            category="Handler Insights"
            read-time="8 min read"
            updated="Last updated January 19th, 2026" />
        {{-- End Article Metadata --}}

        <p class="body text-sp-slate mt-4">
            To get to the story of Hamish, I have to finish the story of Luka, and mentally and emotionally, I haven’t been ready. I think that maybe now I am, though. I’m going to try anyway.
        </p>

        <p class="body text-sp-slate mt-4">
            On July 8th, Luka woke me up around 5:00am to go to the bathroom. Instead of all but dragging me through the house, he walked very slowly. I knew right away he wasn’t feeling great. He went out, and did his business, then we came back inside. When I took off his harness and leash, I assessed him. Everything about his body position told me something was wrong. His neck seemed stiff, and kind of like how I imagine I look when I have a crick in my neck.
        </p>

    </div>

</div>


@endsection

@section('content')

{{-- Guide Content --}}
<section class="grid grid-cols-12 gap-6 px-6 pb-16 md:px-8 md:pb-24">

    {{-- Guide --}}
    <div class="col-span-12 md:col-span-10 md:col-start-1">

        {{-- Guide Hero Image --}}
        <div class="mb-12 md:mb-16 relative">

            <img
                src="{{ asset('images/blog/blog-saying-goodbye-hero.jpg') }}"
                alt="A Doberman Pinscher rolling in the grass.."
                class="w-full aspect-[8/3] object-cover rounded-md">

            <x-public-v2.image-registration
                text="Luka, Photo by Melanie O'Rorke"
                position="left"
                 />

        </div>
        {{-- End Guide Hero Image --}}
    
</div>
{{-- End Guide --}}

    @endsection
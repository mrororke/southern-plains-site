@extends('public-v2.layouts.app')

@section('hero')

{{-- Learn Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    <div class="col-span-12 md:col-span-1">
        <!-- Empty Cell -->
     </div>

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-7">
        
        <p class="font-display font-bold text-2xl text-sp-burntClay">
            Dog Sports 101
        </p>

        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-3">
            What is NASDA, Anyway?
        </h2>

        {{-- Article Metadata --}}
<ul class="flex flex-wrap items-center gap-x-8 gap-y-3 mt-6 text-sp-slate">

    <li class="flex items-center gap-2">

        <x-icons.folder
            class="w-5 h-5 shrink-0"
            aria-hidden="true" />

        <span class="body">
            Dog Sports 101
        </span>

    </li>

    <li class="flex items-center gap-2">

        <x-icons.clock
            class="w-5 h-5 shrink-0"
            aria-hidden="true" />

        <span class="body">
            8 min read
        </span>

    </li>

    <li class="flex items-center gap-2">

        <x-icons.calendar-days
            class="w-5 h-5 shrink-0"
            aria-hidden="true" />

        <span class="body">
            Last updated August 12th, 2026
        </span>

    </li>

</ul>
{{-- End Article Metadata --}}

        <p class="body-large text-sp-slate mt-4 max-w-xl">
            The 
            <a
                href="https://nasda.dog/"
                target="_blank"
                rel="noopener noreferrer"
                class="text-link">
                    North American Sport Dog Association (NASDA)
            </a>
            offers scent-based dog sports designed to show off something dogs are already incredibly good at: using their noses.</p>
        <p class="body-large text-sp-slate mt-4 max-w-xl">
            The games are based on historic working and competitive field activities and are designed to resemble real-life situations for dogs and their handlers. Purebred or mixed breed, young or old, experienced sport dog or complete beginner—NASDA gives dogs of all kinds an opportunity to search, problem-solve, and do what comes naturally.</p>

        <p class="body-large text-sp-slate mt-4 max-w-xl">It’s also an incredibly beginner-friendly dog sport. You don’t need a long list of obedience titles, specialized equipment, or years of training before you can give it a try. Your dog doesn’t have to be perfect to come play.</p>
        </p>

    </div>
     <div class="col-span-12 md:col-span-1">
        <!-- Empty Cell -->
     </div>
    <div class="col-span-12 md:col-span-2 md:p-6 md:border-l border-sp-warmStone">
        Sticky Nav
    </div>

     <div class="col-span-12 md:col-span-1">
        <!-- Empty Cell -->
     </div>

</div>
@endsection
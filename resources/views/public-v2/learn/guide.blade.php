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

        <span class="body-small">
            Dog Sports 101
        </span>

    </li>

    <li class="flex items-center gap-2">

        <x-icons.clock
            class="w-5 h-5 shrink-0"
            aria-hidden="true" />

        <span class="body-small">
            8 min read
        </span>

    </li>

    <li class="flex items-center gap-2">

        <x-icons.calendar-days
            class="w-5 h-5 shrink-0"
            aria-hidden="true" />

        <span class="body-small">
            Last updated August 12th, 2026
        </span>

    </li>

</ul>
{{-- End Article Metadata --}}

        <p class="body text-sp-slate mt-4">
            The 
            <a
                href="https://nasda.dog/"
                target="_blank"
                rel="noopener noreferrer"
                class="text-link">
                    North American Sport Dog Association (NASDA)
            </a>
            offers scent-based dog sports designed to show off something dogs are already incredibly good at: using their noses.</p>
        <p class="body text-sp-slate mt-4">
            The games are based on historic working and competitive field activities and are designed to resemble real-life situations for dogs and their handlers. Purebred or mixed breed, young or old, experienced sport dog or complete beginner—NASDA gives dogs of all kinds an opportunity to search, problem-solve, and do what comes naturally.</p>

        <p class="body text-sp-slate mt-4">It’s also an incredibly beginner-friendly dog sport. You don’t need a long list of obedience titles, specialized equipment, or years of training before you can give it a try. Your dog doesn’t have to be perfect to come play.</p>
        </p>

    </div>
     <div class="col-span-12 md:col-span-1">
        <!-- Empty Cell -->
     </div>
    {{-- Guide Navigation --}}
<aside
    class="hidden md:col-span-2 md:block md:self-start md:sticky md:top-8 md:border-l md:border-sp-warmStone md:pl-6"
    aria-label="Guide navigation">

    <nav>

        <p class="font-display font-bold text-2xl text-sp-prairieGreen uppercase">
            In This Guide
        </p>

        <ul class="flex flex-col gap-4 mt-2">

            <li>
                <a
                    href="#the-games"
                    class="body text-sp-prairieOchre transition-colors hover:text-sp-prairieGreen">
                    The Games
                </a>
            </li>

            <li>
                <a
                    href="#training"
                    class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                    Training
                </a>
            </li>

            <li>
                <a
                    href="#your-first-trial"
                    class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                    Your First Trial
                </a>
            </li>

            <li>
                <a
                    href="#scoring-levels"
                    class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                    Scoring &amp; Levels
                </a>
            </li>

            <li>
                <a
                    href="#what-to-expect"
                    class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                    What to Expect
                </a>
            </li>

            <li>
                <a
                    href="#what-to-bring"
                    class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                    What to Bring
                </a>
            </li>

            <li>
                <a
                    href="#getting-started"
                    class="body text-sp-charcoal transition-colors hover:text-sp-prairieOchre">
                    Getting Started
                </a>
            </li>

        </ul>

    </nav>

</aside>
{{-- End Guide Navigation --}}

     <div class="col-span-12 md:col-span-1">
        <!-- Empty Cell -->
     </div>

</div>
@endsection

@section('content')

super cool

@endsection
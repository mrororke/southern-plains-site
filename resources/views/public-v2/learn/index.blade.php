@extends('public-v2.layouts.app')

@section('hero')

{{-- Learn Hero --}}
<div
    id="hero"
    class="grid grid-cols-12 gap-6 px-6 pt-8 pb-12 md:px-8 md:pt-12 md:pb-16">

    {{-- Intro --}}
    <div class="col-span-12 md:col-span-7">

        <p class="text-eyebrow">
            Learn
        </p>

        <h1 class="text-hero">
            Learn. Grow. Do More.<br class="hidden md:block">
            Together With Your Dog.
        </h1>

        <p class="body-large text-sp-slate mt-4 max-w-3xl">
            Explore guides, training advice, real stories, and book reviews from Southern Plains Sport Dog Club.
            Whether you’re training for your next title, building a better partnership, or just love learning
            with your dog, you’ll find something here.
        </p>

    </div>

    {{-- Search + Filters --}}
    <div class="col-span-12 mt-4 md:mt-8">

        {{-- Search --}}
        <form
            role="search"
            class="w-full">

            <label
                for="learn-search"
                class="sr-only">
                Search Learn
            </label>

            <div class="relative">

                <x-icons.search
                    class="absolute left-4 top-1/2 w-5 h-5 -translate-y-1/2 text-sp-slate"
                    aria-hidden="true" />

                <input
                    type="search"
                    id="learn-search"
                    name="search"
                    placeholder="Search guides, articles, and book reviews"
                    class="w-full rounded-md border border-sp-warmStone bg-sp-warmIvory py-4 pl-12 pr-4 text-sp-charcoal placeholder:text-sp-slate focus:border-sp-prairieGreen focus:outline-none">

            </div>

        </form>

        {{-- Filters --}}
        <nav
            class="mt-6"
            aria-label="Filter Learn articles">

            <ul class="flex flex-wrap gap-x-8 gap-y-4">

                <li>
                    <a
                        href="#"
                        class="text-sm font-semibold uppercase text-sp-charcoal border-b border-sp-charcoal pb-1"
                        aria-current="page">
                        All
                    </a>
                </li>

                <li>
                    <a
                        href="#"
                        class="text-sm font-semibold uppercase text-sp-charcoal hover:text-sp-prairieOchre transition-colors">
                        Dog Sports
                    </a>
                </li>

                <li>
                    <a
                        href="#"
                        class="text-sm font-semibold uppercase text-sp-charcoal hover:text-sp-prairieOchre transition-colors">
                        Handler Insights
                    </a>
                </li>

                <li>
                    <a
                        href="#"
                        class="text-sm font-semibold uppercase text-sp-charcoal hover:text-sp-prairieOchre transition-colors">
                        Training Tips
                    </a>
                </li>

                <li>
                    <a
                        href="#"
                        class="text-sm font-semibold uppercase text-sp-charcoal hover:text-sp-prairieOchre transition-colors">
                        Book Reviews
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</div>
{{-- End Learn Hero --}}

@endsection
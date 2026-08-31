<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Southern Plains Sport Dog Club</title>

    <!-- TODO
    Don't forget to build in dynamic Meta Information
    We also need a favicon -->

    @vite([
    'resources/css/public-v2.css',
    'resources/js/public-v2.js',
    ])
</head>

<body class="bg-sp-warmIvory px-8 py-8">


    <nav class="grid grid-cols-12 items-center">
    {{-- Logo --}}
    <div class="col-span-2">
        <a href="{{ route('public-v2.home') }}" aria-label="Southern Plains Sport Dog Club home">
            <x-logo class="w-32 h-auto" />
        </a>
    </div>

    {{-- Desktop Navigation --}}
    <div class="col-span-10 flex items-center justify-end gap-8">

        <a
            href="{{ route('public-v2.about') }}"
            class="nav-link {{ request()->routeIs('public-v2.about') ? 'nav-link-active' : 'text-red-100' }}"
        >
            About
        </a>

        <a
            href="{{ route('public-v2.training') }}"
            class="nav-link {{ request()->routeIs('public-v2.training') ? 'nav-link-active' : '' }}"
        >
            Training
        </a>

        <a
            href="{{ route('public-v2.dog-sports') }}"
            class="nav-link {{ request()->routeIs('public-v2.dog-sports') ? 'nav-link-active' : '' }}"
        >
            Dog Sports
        </a>

        <a
            href="{{ route('public-v2.learn.index') }}"
            class="nav-link {{ request()->routeIs('public-v2.learn.*') ? 'nav-link-active' : '' }}"
        >
            Learn
        </a>

        <a
            href="{{ route('public-v2.events.index') }}"
            class="nav-link {{ request()->routeIs('public-v2.events.*') ? 'nav-link-active' : '' }}"
        >
            Events
        </a>

        {{-- Site Search --}}
        <div class="relative" data-site-search>
            <button
                type="button"
                class="nav-search-button"
                aria-label="Search the site"
                aria-expanded="false"
                data-search-toggle
            >
                <i data-lucide="search" class="w-5 h-5"></i>
            </button>

            {{-- Search Dropdown --}}
            <div
                class="site-search-dropdown hidden"
                data-search-dropdown
            >
                <form
                    action="#"
                    method="GET"
                    role="search"
                    class="site-search-form"
                >
                    <label for="site-search" class="sr-only">
                        Search Southern Plains Sport Dog Club
                    </label>

                    <div class="relative">
                        <input
                            id="site-search"
                            name="q"
                            type="search"
                            placeholder="What are you looking for?"
                            autocomplete="off"
                            class="site-search-input"
                            data-search-input
                        >

                        <button
                            type="submit"
                            class="site-search-submit"
                            aria-label="Submit search"
                        >
                            <x-icons.search class="w-5 h-5" />
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Primary CTA --}}
        <a
            href="{{ route('public-v2.contact') }}"
            class="nav-contact {{ request()->routeIs('public-v2.contact') ? 'nav-contact-active' : '' }}"
        >
            Contact Us
        </a>

    </div>
</nav>

    @yield('content')

    <footer>
        My footer will live here.
    </footer>


</body>

</html>
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

<body class="bg-sp-warmIvory">
    <header class="header-topo">

        {{-- Desktop Navigation --}}
        <nav class="hidden md:grid grid-cols-12 items-center py-8 px-8">
            {{-- Logo --}}
            <div class="col-span-2">
                <a href="{{ route('public-v2.home') }}" aria-label="Southern Plains Sport Dog Club home">
                    <x-logo class="w-32 h-auto" />
                </a>
            </div>

            <div class="col-span-10 flex items-center justify-end gap-8">

                <a
                    href="{{ route('public-v2.about') }}"
                    class="nav-link {{ request()->routeIs('public-v2.about') ? 'nav-link-active' : '' }}">
                    About
                </a>

                <a
                    href="{{ route('public-v2.training') }}"
                    class="nav-link {{ request()->routeIs('public-v2.training') ? 'nav-link-active' : '' }}">
                    Training
                </a>

                <a
                    href="{{ route('public-v2.dog-sports') }}"
                    class="nav-link {{ request()->routeIs('public-v2.dog-sports') ? 'nav-link-active' : '' }}">
                    Dog Sports
                </a>

                <a
                    href="{{ route('public-v2.learn.index') }}"
                    class="nav-link {{ request()->routeIs('public-v2.learn.*') ? 'nav-link-active' : '' }}">
                    Learn
                </a>

                <a
                    href="{{ route('public-v2.events.index') }}"
                    class="nav-link {{ request()->routeIs('public-v2.events.*') ? 'nav-link-active' : '' }}">
                    Events
                </a>

                {{-- Site Search --}}
                <div class="relative" data-site-search>
                    <button
                        type="button"
                        class="nav-search-button"
                        aria-label="Search the site"
                        aria-expanded="false"
                        data-search-toggle>
                        <x-icons.search class="w-5 h-5" />
                    </button>

                    <!-- TODO: Don't forget to connect your search function to actually search things. -->

                    {{-- Search Dropdown --}}
                    <div
                        class="site-search-dropdown"
                        data-search-dropdown>

                        <form
                            action="#"
                            method="GET"
                            role="search"
                            class="site-search-form">

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
                                    data-search-input>

                                <p class="site-search-helper">
                                    Search training, events, dog sports, and more.
                                </p>

                                <button
                                    type="submit"
                                    class="site-search-submit"
                                    aria-label="Submit search">
                                    <x-icons.search class="w-5 h-5" />
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

                {{-- Primary CTA --}}
                <a
                    href="{{ route('public-v2.contact') }}"
                    class="nav-contact {{ request()->routeIs('public-v2.contact') ? 'nav-contact-active' : '' }}">
                    Contact Us
                </a>

            </div>
        </nav>


        {{-- Mobile Navigation --}}
        <nav class="md:hidden py-8 px-8" data-mobile-nav>

            {{-- Mobile Header --}}
            <div class="flex items-center justify-between">
                <a href="{{ route('public-v2.home') }}" aria-label="Southern Plains Sport Dog Club home">
                    <x-logo class="w-24 h-auto" />
                </a>

                <button
                    type="button"
                    class="mobile-menu-toggle"
                    aria-label="Open navigation"
                    aria-expanded="false"
                    data-mobile-menu-toggle>
                    <x-icons.menu class="w-6 h-6" />
                </button>
            </div>

            {{-- Mobile Menu Panel --}}
            <div
                class="mobile-menu"
                data-mobile-menu>

                <div class="mobile-menu-links">

                    <a
                        href="{{ route('public-v2.about') }}"
                        class="mobile-nav-link {{ request()->routeIs('public-v2.about') ? 'mobile-nav-link-active' : '' }}">
                        About
                    </a>

                    <a
                        href="{{ route('public-v2.training') }}"
                        class="mobile-nav-link {{ request()->routeIs('public-v2.training') ? 'mobile-nav-link-active' : '' }}">
                        Training
                    </a>

                    <a
                        href="{{ route('public-v2.dog-sports') }}"
                        class="mobile-nav-link {{ request()->routeIs('public-v2.dog-sports') ? 'mobile-nav-link-active' : '' }}">
                        Dog Sports
                    </a>

                    <a
                        href="{{ route('public-v2.learn.index') }}"
                        class="mobile-nav-link {{ request()->routeIs('public-v2.learn.*') ? 'mobile-nav-link-active' : '' }}">
                        Learn
                    </a>

                    <a
                        href="{{ route('public-v2.events.index') }}"
                        class="mobile-nav-link {{ request()->routeIs('public-v2.events.*') ? 'mobile-nav-link-active' : '' }}">
                        Events
                    </a>

                </div>

                {{-- Mobile Search --}}
                <form
                    action="#"
                    method="GET"
                    role="search"
                    class="mobile-search-form">

                    <label for="mobile-site-search" class="sr-only">
                        Search Southern Plains Sport Dog Club
                    </label>

                    <div class="relative">
                        <input
                            id="mobile-site-search"
                            name="q"
                            type="search"
                            placeholder="Search the site..."
                            autocomplete="off"
                            class="mobile-search-input">

                        <button
                            type="submit"
                            class="mobile-search-submit"
                            aria-label="Submit search">
                            <x-icons.search class="w-5 h-5" />
                        </button>
                    </div>

                    <p class="site-search-helper">
                        Search training, events, dog sports, and more.
                    </p>
                </form>

                {{-- Mobile CTA --}}
                <a
                    href="{{ route('public-v2.contact') }}"
                    class="mobile-contact {{ request()->routeIs('public-v2.contact') ? 'mobile-contact-active' : '' }}">
                    Contact Us
                </a>

            </div>
        </nav>

        <div id="hero" class="grid grid-cols-12 pt-8">
            <div class="col-span-12 md:col-span-5 md:pr-0 pl-8 pr-8 ">
                <h3 class="text-eyebrow">Play. Train. Grow</h3>
                <h1 class="text-hero">More Ways to Do Great Things<br/>
                    <span class="text-hero-emphasis">With Your Dog.</span></h1>
                    
                    <div class="hl-break">
                        <hr>
                    </div>

                    <p class="body-large">Positive reinforcement training. Dog sports. Real community. 
                        We’re here to help you and your dog learn, play,
                         and thrive — together.</p>

                    <div class="flex gap-6 py-6">
                        <a href="#possibilities" class="btn-primary">
                            Explore What's Possible
                        </a>

                        <a href="{{ route('public-v2.events.index') }}" class="btn-primary-outline">
                            View Events
                        </a>
                    </div>
            </div>
            <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">
                <img
                    class="w-full h-full"
                    src="{{ asset('images/headers/header-home.png') }}"
                    alt="Black and white Sheltie standing among wildflowers on the Oklahoma prairie.">

                <div class="image-registration">
                    <x-icons.locate-fixed class="image-registration-mark" />

                    <span class="image-registration-line"></span>

                    <span class="image-registration-text">
                        Hamish, Photo by Blue Ridge Creative
                    </span>
                </div>
            </div>


        </div>

    </header>

    <!-- END of header -->

    

    

    @yield('content')

    <footer class="py-8">

    {{-- Newsletter Row --}}
    <div class="grid grid-cols-12 px-8">

    <div class="col-span-3">
        Stay In The Loop.
    </div>

    <div class="col-span-5">
        Email field
    </div>

    <div class="col-span-4">
        Image
    </div>

</div>

    {{-- Main Footer Row --}}
    <div class="grid grid-cols-12 px-8">

    <div class="col-span-2">
        Logo
    </div>

    <div class="col-span-4">
        Mission
    </div>

    <div class="col-span-1">
        Explore
    </div>

    <div class="col-span-2">
        Resources
    </div>

    <div class="col-span-3">
        Contact
    </div>

</div>

    {{-- Legal Row --}}
    <div class="grid grid-cols-12 px-8 py-8 bg-sp-prairieGreen">

    <div class="col-span-8 text-sp-warmIvory text-sm">
        Copyright © 2025 - 2026 Southern Plains Sport Dog Club, LLC. All rights reserved.
    </div>

    <div class="col-span-4 text-sp-warmIvory text-sm">
        <a href="{{ route('admin.dashboard-v2.dashboard') }}">Login </a> / Privacy Policy / Terms of Use
    </div>

</div>

</footer>


</body>

</html>
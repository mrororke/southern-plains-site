<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Southern Plains Sport Dog Club</title>

    <!-- TODO
    Don't forget to build in dynamic Meta Information
    We also need a favicon -->

    {{-- Brevo base styles --}}
    <link
        rel="stylesheet"
        href="https://sibforms.com/forms/end-form/build/sib-styles.css">

    {{-- Public V2 styles + scripts --}}
    @vite([
    'resources/css/public-v2.css',
    'resources/js/public-v2.js',
    ])

    {{-- Brevo message panels begin hidden.
         Brevo's JS controls their visibility after submission. --}}
    <style>
        :where(.sib-form-message-panel) {
            display: none;
        }
    </style>

</head>

<body class="bg-sp-warmIvory">

    <header class="header-topo">

        {{-- Desktop Navigation --}}
        <nav class="hidden md:grid grid-cols-12 items-center py-8 px-8">

            {{-- Logo --}}
            <div class="col-span-2">
                <a
                    href="{{ route('public-v2.home') }}"
                    aria-label="Southern Plains Sport Dog Club home">

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

                            <label
                                for="site-search"
                                class="sr-only">
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
        <nav
            class="md:hidden py-8 px-8"
            data-mobile-nav>

            {{-- Mobile Header --}}
            <div class="flex items-center justify-between">

                <a
                    href="{{ route('public-v2.home') }}"
                    aria-label="Southern Plains Sport Dog Club home">

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

                    <label
                        for="mobile-site-search"
                        class="sr-only">
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


        {{-- Hero --}}
        <div
            id="hero"
            class="grid grid-cols-12 pt-8">

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

            <div class="col-span-12 mt-8 md:col-span-7 md:mt-0 relative">

                <img
                    class="w-full h-full"
                    src="{{ asset('images/headers/header-home.png') }}"
                    alt="Black and white Sheltie standing among wildflowers on the Oklahoma prairie.">

                <div class="image-registration image-registration-right">

                    <x-icons.locate-fixed class="image-registration-mark" />

                    <span class="image-registration-line"></span>

                    <span class="image-registration-text-right">
                        Hamish, Photo by Blue Ridge Creative
                    </span>

                </div>

            </div>

        </div>

    </header>

    <!-- END of header -->


    @yield('content')


    <footer>

        {{-- Newsletter Row --}}
        <div class="grid grid-cols-12 items-center bg-sp-prairieGreen">

            {{-- Newsletter Copy --}}
            <div class="col-span-12 px-8 pt-8 md:col-span-3 md:py-0 md:pl-8 md:pr-0">

                <h3 class="text-eyebrow-light">
                    Newsletter
                </h3>

                <h2 class="newsletter-signup">
                    Stay In The Loop.
                </h2>

                <p class="text-sp-limestone text-sm">
                    Get positive training tips, event updates, and
                    early access to registration.
                </p>

            </div>


            {{-- Newsletter Form --}}
            <div class="col-span-12 px-8 py-6 md:col-span-5 md:py-0">

                <div class="newsletter-form">

                    <div class="sib-form">

                        <div
                            id="sib-form-container"
                            class="sib-form-container">

                            {{-- Brevo Error Message --}}
                            <div
                                id="error-message"
                                class="sib-form-message-panel newsletter-message newsletter-message-error">

                                <div class="sib-form-message-panel__text sib-form-message-panel__text--center">

                                    <svg
                                        viewBox="0 0 512 512"
                                        class="sib-icon sib-notification__icon"
                                        aria-hidden="true">

                                        <path d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z" />

                                    </svg>

                                    <span class="sib-form-message-panel__inner-text">
                                        Your subscription could not be saved. Please try again.
                                    </span>

                                </div>

                            </div>

                            <div></div>

                            {{-- Brevo Success Message --}}
                            <div
                                id="success-message"
                                class="sib-form-message-panel newsletter-message newsletter-message-success">

                                <div class="sib-form-message-panel__text sib-form-message-panel__text--center">

                                    <svg
                                        viewBox="0 0 512 512"
                                        class="sib-icon sib-notification__icon"
                                        aria-hidden="true">

                                        <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" />

                                    </svg>

                                    <span class="sib-form-message-panel__inner-text">
                                        Your subscription has been successful.
                                    </span>

                                </div>

                            </div>

                            <div></div>

                            {{-- Brevo Form Container --}}
                            <div
                                id="sib-container"
                                class="sib-container--large sib-container--vertical">

                                <form
                                    id="sib-form"
                                    method="POST"
                                    action="https://a7e86912.sibforms.com/serve/MUIFAJWITnINuKdzydl8wxntokDKQVKmoUHp6mjSXu-RA6Bb88L0eC3bVYrdMY0zW1kGZqGqlwEWyA7JCHuFIo_cjP_HY-R_m_bKNOOJjPKwceUMbZ-IpDY7sf2PEMPmpuWw63T5NHlM2V_BfnrXfouKkOyXsrezGZTv7SsGbm_EXKzXWpeZrF4rJtCCHPwd2EgioW5olrsIk22X-A=="
                                    data-type="subscription"
                                    class="newsletter-form-inner">

                                    <div class="sib-input sib-form-block newsletter-field">

                                        <div class="form__entry entry_block">

                                            <div class="form__label-row">

                                                <label
                                                    class="sr-only entry__label"
                                                    for="EMAIL"
                                                    data-required="*">
                                                    Enter your email address to subscribe
                                                </label>

                                                <div class="entry__field">

                                                    <input
                                                        class="input newsletter-input"
                                                        type="email"
                                                        id="EMAIL"
                                                        name="EMAIL"
                                                        autocomplete="email"
                                                        placeholder="Email Address"
                                                        data-required="true"
                                                        required>

                                                </div>

                                            </div>

                                            <label
                                                class="entry__error entry__error--primary newsletter-field-error">
                                            </label>

                                        </div>

                                    </div>


                                    <div class="sib-form-block newsletter-submit">

                                        <button
                                            class="sib-form-block__button sib-form-block__button-with-loader btn-secondary"
                                            form="sib-form"
                                            type="submit">

                                            <svg
                                                class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon"
                                                viewBox="0 0 512 512"
                                                aria-hidden="true">

                                                <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />

                                            </svg>

                                            Subscribe

                                        </button>

                                    </div>


                                    {{-- Brevo Honeypot --}}
                                    <input
                                        type="text"
                                        name="email_address_check"
                                        value=""
                                        class="input--hidden">

                                    {{-- Brevo Locale --}}
                                    <input
                                        type="hidden"
                                        name="locale"
                                        value="en">

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Newsletter Image --}}
            <div class="col-span-12 md:col-span-4 relative">

                <img
                    class="w-full h-48 object-cover md:h-full"
                    src="{{ asset('images/headers/newsletter.png') }}"
                    alt="A sheltie and an english bulldog running through Oklahoma wildflowers together.">

                <div class="image-registration image-registration-bottom">
                    <x-icons.locate-fixed class="image-registration-mark" />

                    <span class="image-registration-line"></span>

                    <span class="image-registration-text-bottom">
                        Photo by Blue Ridge Creative
                    </span>
                </div>

            </div>


            {{-- Main Footer Row --}}
            <div class="grid grid-cols-12 px-8 py-8 footer-topo">

                <div class="col-span-1">

                    <x-logo class="w-32 h-auto" />

                </div>


                <div class="col-span-2">

                    <p class="text-sp-slate px-4">
                        Building better dog and handler teams through positive training, dog sports, and community.
                    </p>

                </div>


                <div class="col-span-2 col-start-6">

                    <h4 class="footer">
                        Explore
                    </h4>

                    <ul class="footer-nav">
                        <li>About</li>
                        <li>Training</li>
                        <li>Dog Sports</li>
                        <li>Events</li>
                        <li>Contact</li>
                    </ul>

                </div>


                <div class="col-span-2">

                    <h4 class="footer">
                        Resources
                    </h4>

                    <ul class="footer-nav">
                        <li>Getting Started</li>
                        <li>Learn</li>
                        <li>NASDA</li>
                        <li>League Info</li>
                        <li>Trick Dog</li>
                    </ul>

                </div>


                <div class="col-span-2">

                    <h4 class="footer">
                        Contact
                    </h4>

                    <ul class="footer-nav">

                        <li>
                            <x-icons.map-pin />
                            Inola, Oklahoma
                        </li>

                        <li>
                            <x-icons.mail />

                            <a href="mailto:southernplainssportdogclub@gmail.com">
                                southernplainssportdogclub@gmail.com
                            </a>
                        </li>

                    </ul>

                </div>

            </div>


            {{-- Legal Row --}}
            <div class="grid grid-cols-12 px-8 py-8 bg-sp-prairieGreen">

                <div class="col-span-8 text-sp-warmIvory text-sm">
                    Copyright © 2025 - 2026 Southern Plains Sport Dog Club, LLC. All rights reserved.
                </div>

                <div class="col-span-4 text-sp-warmIvory text-sm">
                    <a href="{{ route('login') }}">Login</a>
                    /
                    Privacy Policy
                    /
                    Terms of Use
                </div>

            </div>

    </footer>


    {{-- Brevo Form Configuration --}}
    <script>
        window.REQUIRED_CODE_ERROR_MESSAGE =
            'Please choose a country code';

        window.LOCALE =
            'en';

        window.EMAIL_INVALID_MESSAGE =
            window.SMS_INVALID_MESSAGE =
            'The information provided is invalid. Please review the field format and try again.';

        window.REQUIRED_ERROR_MESSAGE =
            'This field cannot be left blank. ';

        window.GENERIC_INVALID_MESSAGE =
            'The information provided is invalid. Please review the field format and try again.';

        window.INVALID_NUMBER =
            'The information provided is invalid. Please review the field format and try again.';

        window.INVALID_DATE =
            'Please enter a valid date';

        window.REQUIRED_MULTISELECT_MESSAGE =
            'Please select at least 1 option';

        window.translation = {
            common: {
                selectedList: '{quantity} list selected',
                selectedLists: '{quantity} lists selected',
                selectedOption: '{quantity} selected',
                selectedOptions: '{quantity} selected',
            }
        };

        var AUTOHIDE = Boolean(1);
    </script>


    {{-- Brevo Form JavaScript --}}
    <script
        defer
        src="https://sibforms.com/forms/end-form/build/main.js">
    </script>

</body>

</html>
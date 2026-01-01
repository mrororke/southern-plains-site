<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO SLOTS: This is the dynamic title for search engines and browser tabs --}}
    <title>@yield('metaTitle', 'Southern Plains Sport Dog Club | NE Oklahoma Training & NASDA')</title>
    <meta name="description" content="@yield('metaDescription', 'Positive reinforcement dog training, NASDA competition, and community in the Northeastern Oklahoma area.')">

    {{-- SOCIAL SHARING IMAGE --}}
    <meta property="og:image" content="@yield('ogImage', asset('images/og-images/default-social-share.jpg'))">

    {{-- Add your main CSS/Tailwind includes here, e.g., <link href="/css/app.css" rel="stylesheet"> --}}
    @googlefonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- START - We recommend to place the below code in head tag of your website html  -->
    <style>
        /* CSS to control background image visibility based on screen size */
        .error-bg-image {
            /* 1. Hide image by default on mobile */
            background-image: none !important; 
        }

        @media (min-width: 1024px) {
            /* 2. Show image only on desktop (lg) screens and up */
            .error-bg-image {
                background-image: url('{{ asset('images/error-hamish.png') }}') !important;
                background-repeat: no-repeat;
                background-position: bottom right;
                background-size: auto;
            }
        }
        
        /* Existing SibForms Styles (Untouched) */
        #sib-container input:-ms-input-placeholder {
            text-align: left;
            font-family: Helvetica, sans-serif;
            color: #000000;
        }

        #sib-container input::placeholder {
            text-align: left;
            font-family: Helvetica, sans-serif;
            color: #000000;
        }

        #sib-container textarea::placeholder {
            text-align: left;
            font-family: Helvetica, sans-serif;
            color: #000000;
        }

        #sib-container a {
            text-decoration: underline;
            color: #2BB2FC;
        }
    </style>

    <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">
    <!--  END - We recommend to place the above code in head tag of your website html -->


    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body>

    {{--
| ----------------------------------------------------
| DATA DEFINITIONS - SLOT
| This slot is used to define PHP variables (like $slidesData) before any components that need them are called.
| ----------------------------------------------------
--}}
    @yield('data_definitions')

    <nav class="mt-6 z-10" x-data="{ open: false }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="text-black">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current" />
                    </a>
                </div>
                <x-shared.desktop-nav-links />

                <div class="flex items-center md:hidden">
                    <button
                        type="button"
                        @click="open = ! open"
                        :aria-expanded="open"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-black hover:bg-club hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>

                        <svg x-show.important="! open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 absolute inset-0 m-auto">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <svg x-show.important="open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 absolute inset-0 m-auto text-black">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="open"
            x-transition:enter="duration-150 ease-out"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="duration-100 ease-in"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="md:hidden">

            <x-shared.mobile-nav-links />
        </div>
    </nav>

    <main>

        {{-- 
        | ----------------------------------------------------
        | CORRECTED CONTAINER: Mobile padding (px-4 sm:px-6) added to prevent edge touching.
        | ----------------------------------------------------
        --}}
        <div class="min-h-[500px] pt-10 pb-10 error-bg-image px-4 sm:px-6">
            <div class="max-w-4xl mx-auto pt-10 pb-10 py-8">
                @yield('page_content')
            </div>
        </div>

        <x-app-footer />

    </main>


    {{--
| ----------------------------------------------------
| SCRIPTS (Must be before the closing </body> tag)
| ----------------------------------------------------
--}}
    <script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=en"></script>
    {{-- Add any other site-wide scripts here --}}

</body>

</html>
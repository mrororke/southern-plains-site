<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Southern Plains Dog Sport Club, LLC. | Serving Rogers, Mayes, and Wagoner Counties.</title>

    @googlefonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />


    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body class="antialiased h-full w-full">
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Southern Plains Dog Sport Club, LLC. | Serving Rogers, Mayes, and Wagoner Counties.</title>

        @googlefonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />


        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </head>

    <body class="antialiased h-full w-full">

        <div class="min-h-full">

            <nav class="mt-6 z-10" x-data="{ open: false }">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        <div class="text-black lg:text-white">
                            <a href="/">
                                <x-application-logo class="w-20 h-20 fill-current" />
                            </a>
                        </div>
                        <div class="hidden md:block md:flex items-center space-x-4">
                            <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Home</a>
                            <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">About</a>
                            <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Blog</a>
                            <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Training</a>
                            <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">League</a>
                            <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Events</a>
                            <a href="#" aria-current="page">
                                <x-primary-button class="ms-4">
                                    {{ __('Contact Us') }}
                                </x-primary-button>
                            </a>
                        </div>

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

                    <div class="space-y-1 px-4 pb-3 pt-2">
                        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">Home</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">About</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">Blog</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">Training</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">League</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">Events</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">Contact</a>
                    </div>
                </div>
            </nav>
            <main>

                <div class="flex min-h-screen">
                    <!-- Sticky Column -->
                    <div class="hidden lg:block lg:sticky lg:top-0 h-screen w-full lg:w-1/3 -z-10" style="margin-top:-115px">
                        <!-- Content for the sticky column -->
                        <div id="header-carousel" class="relative w-full h-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative overflow-hidden h-screen">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('images/2025_01_slide_hamish.jpg') }}" class="absolute block w-full" alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('images/2025_02_slide_hamish.jpg') }}" class="absolute block w-full" alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('images/2025_03_slide_hamish.jpg') }}" class="absolute block w-full" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Scrollable Column -->
                    <div class="w-full lg:w-2/3 flex-shrink-0 overflow-y-auto">
                        <div class="lg:px-[120px] p-4">
                            <h4 class="uppercase text-xs font-bold">Southern Plains Sport Dog Club</h4>
                            <h1 class="font-heading text-7xl">Train. Play. Grow</h1>
                            <h3 class="text-2xl mb-2 mt-2">Your Home for Positive Dog Training, Sport, and Community.</h3>

                            <p class="text-base mb-2">Welcome to <span class="font-semibold">Southern Plains Sport Dog Club</span> — the region's most comprehensive resource dedicated to building better dog-handler partnerships. Our positive-reinforcement training programs, accessible competitive events, and supportive community are designed to help you and your dog thrive.</p>

                            <p class="text-base mb-2">Whether you're starting with basic manners, pursuing a Canine Good Citizen title, or aiming for titles in NASDA sport trials, we have the classes, events, and expertise you need to <span class="font-semibold">Train, Play, and Grow</span> together.</p>

                            <div class="mt-6">
                                <h3 class="font-heading text-5xl mt-2 mb-6">Choose Your Path</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                                    <a href="#club">
                                        <div class="relative text-white bg-cover bg-center pt-[203.78%]"
                                            style="background-image: url('{{ asset('images/club.png') }}');">
                                            <div class="absolute inset-0 p-6 flex flex-col items-center justify-center text-center">
                                                <h4 class="font-heading font-bold text-5xl mt-8 mb-8">Club</h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#league">
                                        <div class="relative text-white bg-cover bg-center pt-[203.78%]"
                                            style="background-image: url('{{ asset('images/league.png') }}');">
                                            <div class="absolute inset-0 p-6 flex flex-col items-center justify-center text-center">
                                                <h4 class="font-heading font-bold text-5xl mt-8 mb-8">League</h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#train">
                                        <div class="relative text-white bg-cover bg-center pt-[203.78%]"
                                            style="background-image: url('{{ asset('images/train.png') }}');">
                                            <div class="absolute inset-0 p-6 flex flex-col items-center justify-center text-center">
                                                <h4 class="font-heading font-bold text-5xl mt-8 mb-8">Train</h4>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div id="club" class="p-6 bg-club bg-cover bg-center"
                            style="background-image: url('{{ asset('images/right_mask.png') }}');">
                            <div class="lg:px-[120px] p-4">
                                <h4 class="uppercase text-xs font-bold">Southern Plains Sport Dog Club</h4>
                                <h3 class="font-heading text-5xl mb-6">Your gateway to NASDA Competition.</h3>
                                <p class="text-base mb-2">We are licensed <span class="font-semibold">NASDA Club</span> dedicated to hosting high-quality, accessible trials in new and underserved areas. This is the perfect place to try out a sport organization before committing<br /> to full club membership.</p>

                                <x-primary-button color="club-dark" class="mt-6">
                                    {{ __('View Trial Schedule') }}
                                </x-primary-button>

                            </div>
                        </div>
                        <div id="league" class="p-6 bg-league bg-cover bg-center"
                            style="background-image: url('{{ asset('images/left_mask.png') }}');">
                            <div class="lg:px-[120px] p-4">
                                <h4 class="uppercase text-xs font-bold">Southern Plains Sport Dog League</h4>
                                <h3 class="font-heading text-5xl mb-6">Friendly Competition, Fierce Team Spirit</h3>
                                <p class="text-base mb-2">The League provides a regular, local structure for competition and progress measurement. Join our organized events throughout the year to hone your sport skills and enjoy the camaraderie of fellow handlers. <span class="italic">(Formerly Redbud Sport Dog League)</span>.</p>
                                <x-primary-button color="league-dark" class="mt-6">
                                    {{ __('Explore the League') }}
                                </x-primary-button>
                            </div>
                        </div>
                        <div id="train" class="p-6 bg-training bg-cover bg-center"
                            style="background-image: url('{{ asset('images/right_mask.png') }}');">
                            <div class="lg:px-[120px] p-4">
                                <h4 class="uppercase text-xs font-bold">Southern Plains Training</h4>
                                <h3 class="font-heading text-5xl mb-6">From Manners to Masters<br />Building a Solid Foundation</h3>
                                <p class="text-base mb-2">Our focus is positive-reinforcement training that builds confidence and reliable behavior. We offer core classes, including <span class="font-semibold">Basic Manners, Canine Good Citizen (CGC) preparation, Tricks</span>, and specialized workshops to strengthen your partnership.</p>
                                <x-primary-button color="train-dark" class="mt-6">
                                    {{ __('View Current Offerings') }}
                                </x-primary-button>
                            </div>
                        </div>


                        <div class="lg:px-[120px] p-6"><!-- END Why Us -->
                            <h3 class="font-heading text-5xl mb-6">Why Choose Southern Plains?</h3>
                            <div class="grid grid-cols-2 gap-4 text-center">
                                <div class="p-8 border">
                                    <svg width="36" height="36" class="mb-4 mx-auto" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 0H19.25C23.25 0 26.875 2.125 28.875 5.625L32 10.75L35 5.625C37 2.125 40.625 0 44.625 0H45C51 0 56 5 56 11C56 12.875 55.5 14.5 54.75 16H60C62.125 16 64 17.875 64 20V28C64 30.25 62.125 32 60 32H4C1.75 32 0 30.25 0 28V20C0 17.875 1.75 16 4 16H9.125C8.375 14.5 8 12.875 8 11C8 5 12.875 0 19 0ZM23.75 8.625C22.75 7 21.125 6 19.25 6H19C16.125 6 14 8.25 14 11C14 13.875 16.125 16 19 16H28.125L23.75 8.625ZM45 6H44.625C42.75 6 41.125 7 40.125 8.625L35.75 16H45C47.75 16 50 13.875 50 11C50 8.25 47.75 6 45 6ZM4 36H28V64H10C6.625 64 4 61.375 4 58V36ZM36 64V36H60V58C60 61.375 57.25 64 54 64H36Z" fill="#4CBB17" />
                                    </svg>

                                    <h3 class="uppercase text-small font-bold mb-4">Positive Reinforcement</h3>
                                    <p class="text-small mb-2">Our training methods are rooted in science-backed, positive techniques. We focus on building confidence, communication, and a happy, willing partnership with your dog.</p>
                                </div>
                                <div class="p-6 border">
                                    <svg width="36" height="36" class="mb-4 mx-auto" viewBox="0 0 66 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M43 23.625C41.625 24.875 39.625 24.875 38.125 23.75L24.625 13.625L7 27.625C5.375 29 2.875 28.75 1.5 27C0 25.375 0.375 22.875 2.125 21.375L22.125 5.5C23.5 4.25 25.5 4.25 27 5.375L40.5 15.5L58.125 1.5C59.75 0 62.25 0.375 63.625 2.125C65.125 3.75 64.75 6.25 63 7.625L43 23.625ZM20.625 28.5C20.625 26.375 22.375 24.5 24.625 24.5C26.75 24.5 28.625 26.375 28.625 28.5V52.5C28.625 54.75 26.75 56.5 24.625 56.5C22.375 56.5 20.625 54.75 20.625 52.5V28.5ZM4.625 40.5C4.625 38.375 6.375 36.5 8.625 36.5C10.75 36.5 12.625 38.375 12.625 40.5V52.5C12.625 54.75 10.75 56.5 8.625 56.5C6.375 56.5 4.625 54.75 4.625 52.5V40.5ZM44.625 36.5V52.5C44.625 54.75 42.75 56.5 40.625 56.5C38.375 56.5 36.625 54.75 36.625 52.5V36.5C36.625 34.375 38.375 32.5 40.625 32.5C42.75 32.5 44.625 34.375 44.625 36.5ZM52.625 28.5C52.625 26.375 54.375 24.5 56.625 24.5C58.75 24.5 60.625 26.375 60.625 28.5V52.5C60.625 54.75 58.75 56.5 56.625 56.5C54.375 56.5 52.625 54.75 52.625 52.5V28.5Z" fill="#4CBB17" />
                                    </svg>

                                    <h3 class="uppercase text-small font-bold mb-4">Train, Play, Compete</h3>
                                    <p class="text-small mb-2">We provide a structured pathway for every stage: from foundational skills in our Training classes, to engaging Monthly League competitions, to official NASDA Trial events.</p>
                                </div>
                                <div class="p-6 border">
                                    <svg width="36" height="36" class="mb-4 mx-auto" viewBox="0 0 65 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M44.25 16C44.25 18.25 46 20 48.25 20H64.25V58C64.25 61.375 61.5 64 58.25 64H28.125V52.625C30.375 51.75 32 49.875 32.625 47.5L32.75 47C32.875 46.625 32.875 46.375 33 46.125C33.125 46 33.375 45.75 33.625 45.5L34 45.125C35.875 43.25 36.625 40.375 35.875 37.75L35.75 37.25C35.75 36.875 35.625 36.5 35.625 36.375C35.625 36.125 35.75 35.875 35.875 35.375V35C36.625 32.375 35.875 29.5 33.875 27.5L33.625 27.25C33.375 26.875 33.125 26.75 33 26.5C32.875 26.375 32.875 26 32.75 25.625L32.625 25.125C31.875 22.5 29.875 20.375 27.25 19.75L26.75 19.625C26.375 19.5 26.125 19.375 25.875 19.375C25.75 19.125 25.5 19 25.25 18.75L24.875 18.375C23.5 16.875 21.5 16 19.5 16C18.875 16 18.125 16.125 17.5 16.375L17 16.5C16.625 16.5 16.375 16.625 16.25 16.625V6C16.25 2.75 18.875 0 22.25 0H44.25V16ZM48.25 0L64.25 16H48.25V0ZM28.75 46.5C28.625 46.875 28.5 47.125 28.375 47.375C27.875 48.25 27.125 48.875 26.125 49.125C24.375 49.625 24.75 49.5 24.125 49.75V64L16.25 60L8.25 64V49.75C7.875 49.625 7.875 49.625 7.625 49.5C7.5 49.5 7.125 49.375 6.25 49.125C5 48.75 4 47.75 3.625 46.5C3.5 45.875 3.375 45.375 3.25 45C2.875 44 2.625 43.75 1.25 42.375C1 42.125 0.875 41.875 0.625 41.625C0.25 40.75 0 39.75 0.375 38.75C1 36.125 1 36.5 0.375 34C0 33 0.25 32 0.625 31.125C0.875 30.875 1 30.625 1.25 30.375C2.375 29.125 2.75 28.875 3.125 28.125C3.25 27.75 3.375 27.125 3.625 26.125C4 24.875 5 23.875 6.25 23.5C8.75 22.875 8.375 23 10.25 21.125C10.625 20.875 11 20.625 11.375 20.375C11.5 20.375 11.5 20.375 11.625 20.25C12 20.125 12.5 20 12.875 20C13.25 20 13.5 20.125 13.75 20.125C15 20.5 15.5 20.75 16.125 20.75C16.75 20.75 17.25 20.5 18.5 20.125C18.625 20.125 18.625 20.125 18.625 20.125C18.625 20.125 18.625 20.125 18.5 20.125C18.875 20.125 19.125 20 19.5 20C19.875 20 20.375 20.125 20.75 20.25C20.875 20.375 20.875 20.375 21 20.375C21.375 20.625 21.75 20.875 22.125 21.125C22.25 21.375 22.5 21.625 22.625 21.75C23 22.125 23.25 22.375 23.5 22.5C24.125 23 24.625 23.125 26.125 23.5C27.125 23.875 27.875 24.5 28.375 25.25C28.5 25.5 28.625 25.875 28.75 26.125C28.875 26.875 29 27.25 29.125 27.625C29.5 28.75 29.75 28.875 31.125 30.375C32 31.25 32.375 32.625 32 34C31.375 36.5 31.375 36.125 32 38.75C32.375 40 32 41.375 31.125 42.375C29.75 43.75 29.5 43.875 29.125 45C29 45.375 28.875 45.875 28.75 46.5ZM16.25 44C20.625 44 24.125 40.5 24.125 36C24.125 31.625 20.625 28 16.25 28C15.625 28 15.125 28.125 14.625 28.25C13.5 28.375 12.625 28.875 11.75 29.375C10.875 30 10.125 30.75 9.5 31.625C8.75 32.875 8.25 34.375 8.25 36C8.25 37.75 8.75 39.25 9.5 40.5C10.125 41.375 10.875 42.125 11.75 42.75C12.625 43.25 13.5 43.625 14.625 43.875C15.125 44 15.625 44 16.25 44Z" fill="#4CBB17" />
                                    </svg>

                                    <h3 class="uppercase text-small font-bold mb-4">Qualified & Certified</h3>
                                    <p class="text-small mb-2">Our lead instructor is an authorized AKC Canine Good Citizen (CGC) Evaluator and a Level 3 Fit Dog Instructor, ensuring the highest standards in manners, safety, and canine conditioning.</p>

                                </div>
                                <div class="p-6 border">
                                    <svg width="36" height="36" class="mx-auto mb-4" viewBox="0 0 80 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M39.875 40C32.75 40 26.875 34.25 27 27C27 19.875 32.75 14 39.875 14C47 14 52.875 19.875 52.875 27C52.875 34.25 47.125 40 39.875 40ZM46.125 44C56 44 64 51.5 64 60.75C64 62.625 62.375 64 60.375 64H19.5C17.5 64 16 62.625 16 60.75C16 51.5 23.875 44 33.75 44H46.125ZM64 20C58.375 20 54 15.625 54 10C54 4.5 58.375 0 64 0C69.5 0 74 4.5 74 10C74 15.625 69.5 20 64 20ZM22.875 27C22.875 31.25 24.5 35.125 27.125 38H2.125C0.875 38 0 37 0 35.75C0 29.25 4.875 24 11 24H18.625C20.25 24 21.75 24.375 23.125 25.125C23 25.75 22.875 26.375 22.875 27ZM16 20C10.375 20 6 15.625 6 10C6 4.5 10.375 0 16 0C21.5 0 26 4.5 26 10C26 15.625 21.5 20 16 20ZM68.875 24C75 24 80 29.25 80 35.75C80 37 79 38 77.75 38H52.75C55.375 35.125 56.875 31.25 56.875 27C56.875 26.375 56.75 25.75 56.75 25.125C58.125 24.5 59.625 24 61.25 24H68.875Z" fill="#4CBB17" />
                                    </svg>

                                    <h3 class="uppercase text-small font-bold mb-4">Community Focused</h3>
                                    <p class="text-small mb-2">More than just training, we are a supportive network of handlers committed to learning, competing, and growing together in a welcoming environment. Join our team!</p>

                                </div>
                            </div>

                        </div> <!-- END Why Us -->

                        <div class="lg:px-[120px] p-6"> <!-- BEGIN testimonial -->
                            <h3 class="font-heading text-5xl mb-6">Hear it From Our Handlers</h3>
                            <p class="text-base mb-2">Nothing proves the strength of our system like the success stories of the dogs and handlers we work with. See what our community has to say about training, competing, and growing with Southern Plains.</p>


                            <!-- BEGIN Testimonial CAROUSEL -->
                            <div id="testimonials-carousel" class="relative w-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative h-56 overflow-hidden  mt-4 mb-4 md:h-96">
                                    <!-- Item 1 -->
                                    <div class="hidden duration-700 ease-in-out bg-gray-100 lg:px-[100px] lg:p-6" data-carousel-item="active">
                                        <div class="grid grid-cols-4">
                                            <div class="p-8 ">
                                                <img src="{{ asset('images/quote.png') }}" class="mx-auto pt-2" alt="Green opening quotation mark">
                                            </div>
                                            <div class="p-8 col-span-3">
                                                <p class="text-lg">
                                                    "I started training because my dog was reactive. The positive methods here not only fixed that but inspired me to pursue competitive dog sports! Knowing the instructor is an official CGC Evaluator gave me so much confidence in the foundational safety and manners training. We now look forward to the monthly league comps."
                                                </p>
                                                <p class="italic text-right pt-4">— Michael T., Handler of 'Gus'</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Item 2 -->
                                    <div class="hidden duration-700 ease-in-out bg-gray-100 lg:px-[100px] lg:p-6" data-carousel-item>
                                        <div class="grid grid-cols-4">
                                            <div class="p-8 ">
                                                <img src="{{ asset('images/quote.png') }}" class="mx-auto pt-2" alt="Green opening quotation mark">
                                            </div>
                                            <div class="p-8 col-span-3">
                                                <p class="text-lg">
                                                    "I started training because my dog was reactive. The positive methods here not only fixed that but inspired me to pursue competitive dog sports! Knowing the instructor is an official CGC Evaluator gave me so much confidence in the foundational safety and manners training. We now look forward to the monthly league comps."
                                                </p>
                                                <p class="italic text-right pt-4">— Michael C., Handler of 'Tuff'</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Item 3 -->
                                    <div class="hidden duration-700 ease-in-out bg-gray-100 lg:px-[100px] lg:p-6"" data-carousel-item>
                                        <div class=" grid grid-cols-4">
                                        <div class="p-8 ">
                                            <img src="{{ asset('images/quote.png') }}" class="mx-auto pt-2" alt="Green opening quotation mark">
                                        </div>
                                        <div class="p-8 col-span-3">
                                            <p class="text-lg">
                                                "I started training because my dog was reactive. The positive methods here not only fixed that but inspired me to pursue competitive dog sports! Knowing the instructor is an official CGC Evaluator gave me so much confidence in the foundational safety and manners training. We now look forward to the monthly league comps."
                                            </p>
                                            <p class="italic text-right pt-4">— Michael H., Handler of 'Margo'</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Slider indicators NOTE: ONE IS NEEDED FOR EACH SLIDE -->
                            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                        </div>
                        <!-- END Testimonial Carousel -->
                    </div><!-- END testimonial  -->

                    <div id="footer" class="p-6 bg-club"><!-- BEGIN Footer -->
                        <div class="lg:px-[120px] p-4">
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <div class="text-black">
                                        <x-application-logo-footer class="w-20 h-20 fill-current" />
                                    </div>
                                    <h3 class="font-heading text-5xl mb-6">Footer.</h3>
                                </div>
                                <div>
                                    <h3 class="font-heading text-5xl mb-6">Footer.</h3>
                                </div>
                                <div>
                                    <h3 class="font-heading text-5xl mb-6">Footer.</h3>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs">Copyright &copy; 2025 - 2026 Southern Plains Sport Dog Club, LLC. All rights. reserved.<br/>
                                By using this site, you agree to our Terms of Service and Privacy Policy.For copyright, accessibility inquiries, or other policies, visit our Legal & Policies Hub, or contact us at <a href="mailto:southernplainssportsdogclub@gmail.com">southernplainssportsdogclub@gmail.com</a></p>
                            </div>



                        </div>
                    </div> <!-- END footer -->
                </div>


        </div> <!-- END Scrollable Column -->


        </main>
        </div>


    </body>

    </html>
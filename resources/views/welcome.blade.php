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
                    <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
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

                        
                        <div class="lg:px-[120px] p-6">
                            <h3 class="font-heading text-5xl mb-6">Why Choose Southern Plains?</h3>
                            <div class="grid grid-cols-2 gap-4 text-center">
        <div class="p-6 border">
            <img src="{{ asset('images/positive_reinfocement.svg') }}" alt="...">
            <h3 class="uppercase text-small font-bold">Positive Reinforcement</h3>
            <p class="text-xs mb-2">Our training methods are rooted in science-backed, positive techniques. We focus on building confidence, communication, and a happy, willing partnership with your dog.</p>
        </div>
        <div class="p-6 border">
        </div>
        <div class="p-6 border">
            
        </div>
        <div class="p-6 border">

        </div>
    </div>
                            
                        </div>

                </div> <!-- END Scrollable Column -->


        </main>
    </div>

</body>

</html>
    
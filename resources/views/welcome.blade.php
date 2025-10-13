<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Southern Plains Dog Sport Club, LLC. | Serving Rogers, Mayes, and Wagoner Counties.</title>

    <!-- Fonts -->
    @googlefonts

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />


    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    


</head>

<body class="antialiased min-h-screen w-full">
    <div class="min-h-full">
        <nav class="mt-6" x-data="{ open: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div>
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

                            <svg x-show.important="open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 absolute inset-0 m-auto **text-black**">
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
            <div class="mx-auto  px-4 py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                <div class="grid grid-cols-4 gap-4">
                    <div>
                        

<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/2025_01_slide_hamish.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-2.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

                    </div>
                    <div class="col-span-3">
                        Content here in rows
                    </div>

                </div>

            </div>
        </main>
    </div>

</body>

</html>
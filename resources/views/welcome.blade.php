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

    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</head>

<body class="antialiased min-h-screen w-full grid">
    <div class="min-h-full">
        <nav class="mt-6">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div>
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current" />
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">

                        <a href="#" aria-current="page" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Home</a>
                        <a href="#" aria-current="page" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">About</a>
                        <a href="#" aria-current="page" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Blog</a>
                        <a href="#" aria-current="page" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Training</a>
                        <a href="#" aria-current="page" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">League</a>
                        <a href="#" aria-current="page" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Events</a>
                        <a href="#" aria-current="page"><x-primary-button class="ms-4">
                                {{ __('Contact Us') }}
                            </x-primary-button>

                    </div>

                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
    </div>


    </nav>

    <header class="relative bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
        </div>
    </main>
    </div>

</body>

</html>
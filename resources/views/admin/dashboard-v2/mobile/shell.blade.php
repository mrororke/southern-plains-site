<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Southern Plains Sport Dog Club - @yield('title', 'Southern Plains Sport Dog Club')</title>

    @googlefonts

    @vite(['resources/css/dashboard-v2.css', 'resources/js/app.js'])

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js" defer></script>
</head>


    <body class="bg-sp-softWhite font-sans antialiased min-h-screen">

    <!-- Mobile Header -->
    <!-- Mobile Header -->
<body 
    x-data="{ menuOpen: false }"
    class="bg-sp-softWhite font-sans antialiased min-h-screen">

<header class="flex items-center justify-between bg-sp-deepGranite px-4 py-3 relative z-50">

    <!-- Logo -->
    <a href="{{ route('admin.mobile-shell') }}"
        class="group">

        <x-icons.admin-logo 
            class="h-8 w-auto text-sp-softWhite transition-colors group-hover:text-sp-controlledLime" />

    </a>


    <!-- Hamburger / Close Button -->
    <button
        type="button"
        @click="menuOpen = !menuOpen"
        class="text-sp-softWhite transition-colors hover:text-sp-controlledLime">

        <svg
            x-show="!menuOpen"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            class="h-7 w-7">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />

        </svg>


        <svg
            x-show="menuOpen"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            class="h-7 w-7 text-sp-softWhite">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18 18 6M6 6l12 12" />

        </svg>

    </button>

</header>


<!-- Slide Down Menu -->
<nav
    x-show="menuOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="-translate-y-full"
    x-transition:enter-end="translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-y-0"
    x-transition:leave-end="-translate-y-full"
    class="absolute top-0 left-0 w-full bg-sp-softWhite z-40 pt-20 shadow-md">
     <!-- TODO: This should be global search; When you search, it shouldn't disappear. It should remain there. -->
                <input
                    type="text"
                    name="globalSearch"
                    value=""
                    placeholder="Search anything..."
                    class="mt-1 block border border-sp-deepGranite rounded-md px-6 py-4 focus:border-sp-deepGranite placeholder:italic placeholder:text-md placeholder:text-sp-deepGranite w-full ">

    <a href="#"
        class="block px-6 py-4 text-sp-darkGranite border-b border-sp-alloyGray">
        Dashboard
    </a>

    <a href="#"
        class="block px-6 py-4 text-sp-darkGranite border-b border-sp-alloyGray">
        Behavior Library
    </a>

</nav>


    <!-- Page Content -->
    <main class="p-4">
         <!-- TODO: This should be global search; When you search, it shouldn't disappear. It should remain there. -->
                <input
                    type="text"
                    name="globalSearch"
                    value=""
                    placeholder="Search anything..."
                    class="mt-1 block border border-sp-deepGranite rounded-md bg-transparent focus:border-sp-deepGranite placeholder:italic placeholder:text-md placeholder:text-sp-deepGranite w-full ">

        Mobile content goes here.

    </main>

</body>

</html>
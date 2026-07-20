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
    <header class="flex items-center justify-between bg-sp-deepGranite px-4 py-3">

        <!-- Logo -->
        <a href="{{ route('admin.mobile-shell') }}"
            class="group">
            <x-icons.admin-logo 
                class="h-8 w-auto text-sp-softWhite transition-colors group-hover:text-sp-controlledLime" />
        </a>

        <!-- Hamburger -->
        <button
            type="button"
            class="text-sp-softWhite transition-colors hover:text-sp-controlledLime">

            <svg 
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

        </button>

    </header>


    <!-- Page Content -->
    <main class="p-4">

        Mobile content goes here.

    </main>

</body>

</html>
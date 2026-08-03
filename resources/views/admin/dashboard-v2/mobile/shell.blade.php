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



    <!-- Mobile Header -->

    <body
        x-data="{ menuOpen: false }"
        class="bg-white font-sans antialiased min-h-screen">

        <x-admin.mobile.header />

        <x-admin.mobile.navigation />


        <!-- Page Content -->
        <main class="p-4">
            <x-admin.mobile.page-header title="Dashboard" />
       
            <input
                type="text"
                name="globalSearch"
                value=""
                placeholder="Search anything..."
                class="mt-1 mb-1 block border border-sp-charcoal rounded-md bg-transparent focus:border-sp-charcoal placeholder:italic placeholder:text-md placeholder:text-sp-charcoal w-full ">

            <!-- Most Recent Additions -->
            <div class="bg-sp-limestone px-6 py-4 mt-4 rounded-md">
                <div class="items-center">
                    <h1 class="font-heading text-3xl">Newest Behaviors</h1>
                    We will have filters with the search bar, and here will be the five most recently added behaviors to the catalog.
                </div>

            </div>

        </main>

    </body>

</html>
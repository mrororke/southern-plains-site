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


    <body 
    x-data="{ sidebarOpen: false }"
    class="bg-sp-softWhite font-sans antialiased grid grid-cols-12 h-screen">


    <x-admin.sidebar.sidebar :navigation="$navigation" />

    <div class="col-span-11 grid grid-rows-[auto_1fr] h-full">

        <x-admin.top-nav />

        <main class="p-4">
            {{ Breadcrumbs::render() }}
            <div class="py-4">
                <img src="{{ asset('images/headers/dashboard.png') }}" alt="Dashboard Header" class="rounded-md">
            </div>

            <x-admin.inbox />
        </main>

    </div>

</body>
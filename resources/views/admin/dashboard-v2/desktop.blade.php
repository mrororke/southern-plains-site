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

<body class="bg-sp-softWhite font-sans antialiased grid grid-cols-12 h-screen">

    <aside class="grid grid-cols-1 bg-sp-deepGranite text-sp-softWhite">
        <a href="{{ route('admin.dashboard') }}"
            class="group flex pt-4 justify-center rounded-lg text-sp-softWhite hover:bg-sp-alloyGray transition-colors">

            <x-icons.admin-logo class="transition-colors group-hover:text-sp-controlledLime" />

        </a>
    </aside>

    <div class="col-span-11 grid grid-rows-[auto_1fr] h-full">

        <nav class="bg-sp-alloyGray">
            Search bar and profile info here
        </nav>

        <main>
            Content area
        </main>

    </div>

</body>
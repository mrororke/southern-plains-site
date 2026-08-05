<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Southern Plains Sport Dog Club - @yield('title', 'Southern Plains Sport Dog Club')</title>

    @googlefonts

    @vite('resources/css/dashboard-v2.css')
    @stack('page-scripts')
    @vite('resources/js/app.js')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js" defer></script>
</head>

<body 
    x-data="{ sidebarOpen: false }"
    class="min-h-screen bg-white font-sans antialiased grid grid-cols-12">

    <x-admin.sidebar.sidebar :navigation="$navigation" />

    <div class="col-span-11 grid grid-rows-[auto_1fr]">

        <x-admin.top-nav />

        <main class="p-4">
            {{ Breadcrumbs::render() }}

            @yield('content')

        </main>

    </div>

</body>
</html>

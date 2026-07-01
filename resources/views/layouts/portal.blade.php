<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - @yield('title', 'Your App Name')</title>

    @googlefonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>


<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen">

        <x-portal.sidebar />

        <main class="flex-1 overflow-y-auto">

            <x-portal.header />

            <div class="p-6">
                @yield('content')
            </div>
            
        </main>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Southern Plains Sport Dog Club') }}</title>

    <!-- Fonts -->
    @googlefonts

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-sp-charcoal antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-sp-warmIvory">
        <div>
            <a href="/">
                <x-icons.admin-logo
                    class="transition-colors
                         group-hover:text-sp-prairieGreen" />
            </a>
        </div>
        <div class="py-4">
            <h4 class="text-xs font-display text-sp-burntClay">Southern Plains Sport Dog Club</h4>
            <h2 class="text-4xl font-semibold font-sans">Administration Dashboard</h2>
        </div>

        <div class="w-full rounded-md sm:max-w-md mt-6 px-6 py-4 border b-sp-warmStone bg-white overflow-hidden">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
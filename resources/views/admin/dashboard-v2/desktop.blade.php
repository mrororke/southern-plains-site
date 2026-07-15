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

<body>
    <aside>
        Dock Will be Here
    </aside>

    <nav>
        Search bar and profile info here
</nav>

    <div>
        Content area<br/>
        <b>Admin Shell</b><br/>
        <ul>
            <li>Sidebar Collapsed</li>
            <li>Sidebar hover animation</li>
            <li>mobile drawer <- on mobile build, not desktop</li>
            <li>breadcrumbs</li>
            <li>hero</li>
            <li>global search</li>
            <li>desktop content container</li>
            <li>mobile content container <- on mobile build, not desktop</li>

        </ul>
    </div>
</body>
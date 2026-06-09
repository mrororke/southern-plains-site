<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Portal')</title>
</head>
<body>

    <aside>
        Sidebar
    </aside>

    <header>
        Header
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>
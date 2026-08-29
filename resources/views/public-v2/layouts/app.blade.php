<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Southern Plains Sport Dog Club</title>

    <!-- TODO
    Don't forget to build in dynamic Meta Information
    We also need a favicon -->

    @vite([
    'resources/css/public-v2.css',
    'resources/js/public-v2.js',
    ])
</head>

<body>
    <header>
        My header will live hear.
    </header>
    @yield('content')

    <footer>
        My footer will live here.
    </footer>
</body>

</html>
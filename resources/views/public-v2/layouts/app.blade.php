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

<body class="bg-sp-warmIvory">

    <div class="px-8">

        <nav class="grid grid-cols-12 items-center">
            <div class="col-span-2">
                <a href="#">
                    <x-logo class="h-20 w-20 fill-current" />
                </a>
            </div>

            <div class="col-span-10 py-4">
                nav will go here
            </div>
        </nav>

        @yield('content')

        <footer>
            My footer will live here.
        </footer>

    </div>

</body>

</html>
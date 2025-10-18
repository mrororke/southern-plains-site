<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Southern Plains Dog Sport Club, LLC. | Serving Rogers, Mayes, and Wagoner Counties.</title>

    @googlefonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />


    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body class="antialiased h-full w-full">

    <div class="bg-cover bg-top h-screen w-screen"
         style="background-image: url('{{ asset('images/coming_soon_bg.jpg') }}');">
        <div class="backdrop-blur-md h-full w-full flex items-center justify-center">
            <div class="flex items-center justify-center  bg-white/50 min-h-96">
    <div class="flex w-full max-w-4xl bg-cover bg-right-bottom"
    style="background-image: url('{{ asset('images/right_mask.png') }}');">

            <h2 class="text-xl font-bold mb-2">Left Column</h2>
            <p class="text-gray-700">Content for the first column. This takes up half the width of the main container.</p>
        

    </div>
</div>

    </div>

</body>

</html>
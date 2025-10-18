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
                <div class="flex w-full max-w-4xl bg-cover bg-right-bottom min-h-96"
                    style="background-image: url('{{ asset('images/right_mask.png') }}');">

                    <div class="px-[120px]">
                        <div class="text-black flex text-black mb-4 justify-center items-center">
                                <x-application-logo class="w-20 h-20 fill-current" />
                        </div>

                        <h1 class="font-heading text-5xl mb-6">The Southern Plains Evolution is Coming!</h1>
                        <h3 class="text-2xl mb-2 mt-2">The new website launches January 1, 2026, bringing expanded League and Training information.</h3>
                        <p class="text-base mb-2">We're creating a streamlined, central resource for all things Southern Plains, featuring detailed schedules, resources, and online registration.</p>
                        <p class="text-base mb-2 font-bold">
                            Don't wait until January 1st to secure your spot!
                        </p>
                         <p class="text-base mb-2 font-bold">
                            Join the official mailing list below for PRIORITY ACCESS to all registration links and event announcements before the general public.
                        </p>

                    </div>




                </div>
            </div>

        </div>

</body>

</html>
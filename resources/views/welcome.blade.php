<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Southern Plains Dog Sport Club, LLC. | Serving Rogers, Mayes, and Wagoner Counties.</title>

    @googlefonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <style>
        /* In your main CSS file or <style> block */
.fixed-background {
    /* Set the image URL */
    background-image: url('{{ asset('images/2025_01_slide_hamish.jpg') }}');
    
    /* Make it fixed so it doesn't scroll */
    background-attachment: fixed;
    
    /* Cover the entire body */
    background-size: cover;
    
    /* Center the image */
    background-position: center center;
}
</style>


    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body class="antialiased h-full w-full"> 
    
    <div id="hero-slider-fixed" class="fixed top-0 left-0 w-screen h-screen z-[-10]">

        <div id="hamish-slider" class="relative w-full h-full" data-carousel="slide">
            <div class="relative w-full h-full overflow-hidden">
                
                <div class="duration-700 ease-in-out h-full" data-carousel-item>
                    <img src="{{ asset('images/2025_01_slide_hamish.jpg') }}" 
                         class="absolute inset-0 block object-cover"
                         style="width: 100vw !important; height: 100vh !important;" 
                         alt="Hamish the dog on slide 1">
                </div>
                
                <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                    <img src="{{ asset('images/2025_02_slide_hamish.jpg') }}" 
                         class="absolute inset-0 block object-cover"
                         style="width: 100vw !important; height: 100vh !important;" 
                         alt="Hamish the dog on slide 2">
                </div>
                
                <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                    <img src="{{ asset('images/2025_03_slide_hamish.jpg') }}" 
                         class="absolute inset-0 block object-cover"
                         style="width: 100vw !important; height: 100vh !important;" 
                         alt="Hamish the dog on slide 3">
                </div>
                
            </div>
        </div>
    </div>
    <div class="min-h-full">
        
        <header class="h-screen/4 bg-transparent pt-6 relative z-10">
            <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" x-data="{ open: false }">
                <div class="flex items-center justify-between">
                    <div>
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current" />
                        </a>
                    </div>
                    <div class="hidden md:block md:flex items-center space-x-4">
                        <a href="#" class="px-3 py-2 text-sm font-medium text-white uppercase hover:text-club hover:underline">Home</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-white uppercase hover:text-club hover:underline">About</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-white uppercase hover:text-club hover:underline">Blog</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-white uppercase hover:text-club hover:underline">Training</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-white uppercase hover:text-club hover:underline">League</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-white uppercase hover:text-club hover:underline">Events</a>
                        <a href="#" aria-current="page">
                            <x-primary-button class="ms-4">
                                {{ __('Contact Us') }}
                            </x-primary-button>
                        </a>
                    </div>
                    <div class="flex items-center md:hidden">...</div>
                </div>
                <div x-show="open" class="md:hidden">...</div>
            </nav>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-10">
                <h1 class="text-4xl text-white font-bold">Welcome to Southern Plains</h1>
            </div>
        </header>

        <main class="bg-white relative z-10">
            <div class="mx-auto px-4 py-6 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-4 gap-4">
                    <div>Left column content.</div>
                    <div class="col-span-3">
                        <p>Content here in rows that will scroll over the fixed area above, but since this main section has a solid white background, the fixed slider is masked below the fold.</p>
                        <div class="h-96 bg-gray-100 my-4">Placeholder 1</div>
                        <div class="h-96 bg-gray-200 my-4">Placeholder 2</div>
                        <div class="h-96 bg-gray-100 my-4">Placeholder 3</div>
                        <div class="h-96 bg-gray-200 my-4">Placeholder 4</div>
                        <div class="h-96 bg-gray-100 my-4">Placeholder 5</div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
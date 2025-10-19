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

    <div class="min-h-full">

        <nav class="mt-6 z-10" x-data="{ open: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="text-black lg:text-white">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current" />
                        </a>
                    </div>
                    <div class="hidden md:block md:flex items-center space-x-4">
                        <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Home</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">About</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Blog</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Training</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">League</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-black uppercase hover:text-club hover:underline">Events</a>
                        <a href="#" aria-current="page">
                            <x-primary-button class="ms-4">
                                {{ __('Contact Us') }}
                            </x-primary-button>
                        </a>
                    </div>

                    <div class="flex items-center md:hidden">
                        <button
                            type="button"
                            @click="open = ! open"
                            :aria-expanded="open"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-black hover:bg-club hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>

                            <svg x-show.important="! open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 absolute inset-0 m-auto">
                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <svg x-show.important="open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 absolute inset-0 m-auto text-black">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div x-show="open"
                x-transition:enter="duration-150 ease-out"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="duration-100 ease-in"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="md:hidden">

                <div class="space-y-1 px-4 pb-3 pt-2">
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">Home</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">About</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">Blog</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">Training</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">League</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">Events</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-100 hover:text-club">Contact</a>
                </div>
            </div>
        </nav>
        <main>

            <div class="flex min-h-screen">
                <!-- Sticky Column -->
                <div class="hidden lg:block lg:sticky lg:top-0 h-screen w-full lg:w-1/3 -z-10" style="margin-top:-115px">
                    <!-- Content for the sticky column -->
                    <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative overflow-hidden h-screen">
                            <!-- Item 1 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('images/2025_01_slide_hamish.jpg') }}" class="absolute block w-full" alt="...">
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('images/2025_02_slide_hamish.jpg') }}" class="absolute block w-full" alt="...">
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('images/2025_03_slide_hamish.jpg') }}" class="absolute block w-full" alt="...">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scrollable Column -->
                <div class="w-full lg:w-2/3 flex-shrink-0 overflow-y-auto">
                    <div class="lg:px-[120px] p-4">
                        <h4 class="uppercase text-xs font-bold">Southern Plains Sport Dog Club</h4>
                        <h1 class="font-heading text-7xl">Train. Play. Grow</h1>
                        <h3 class="text-2xl mb-2 mt-2">Your Home for Positive Dog Training, Sport, and Community.</h3>

                        <p class="text-base mb-2">Welcome to <span class="font-semibold">Southern Plains Sport Dog Club</span> — the region's most comprehensive resource dedicated to building better dog-handler partnerships. Our positive-reinforcement training programs, accessible competitive events, and supportive community are designed to help you and your dog thrive.</p>

                        <p class="text-base mb-2">Whether you're starting with basic manners, pursuing a Canine Good Citizen title, or aiming for titles in NASDA sport trials, we have the classes, events, and expertise you need to <span class="font-semibold">Train, Play, and Grow</span> together.</p>

                        <div class="mt-6">
                            <h3 class="font-heading text-5xl mt-2 mb-6">Choose Your Path</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                                <a href="#club">
                                    <div class="relative text-white bg-cover bg-center pt-[203.78%]"
                                        style="background-image: url('{{ asset('images/club.png') }}');">
                                        <div class="absolute inset-0 p-6 flex flex-col items-center justify-center text-center">
                                            <h4 class="font-heading font-bold text-5xl mt-8 mb-8">Club</h4>
                                        </div>
                                    </div>
                                </a>
                                <a href="#league">
                                    <div class="relative text-white bg-cover bg-center pt-[203.78%]"
                                        style="background-image: url('{{ asset('images/league.png') }}');">
                                        <div class="absolute inset-0 p-6 flex flex-col items-center justify-center text-center">
                                            <h4 class="font-heading font-bold text-5xl mt-8 mb-8">League</h4>
                                        </div>
                                    </div>
                                </a>
                                <a href="#train">
                                    <div class="relative text-white bg-cover bg-center pt-[203.78%]"
                                        style="background-image: url('{{ asset('images/train.png') }}');">
                                        <div class="absolute inset-0 p-6 flex flex-col items-center justify-center text-center">
                                            <h4 class="font-heading font-bold text-5xl mt-8 mb-8">Train</h4>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>

                    <div id="club" class="p-6 bg-club bg-cover bg-center"
                        style="background-image: url('{{ asset('images/right_mask.png') }}');">
                        <div class="lg:px-[120px] p-4">
                            <h4 class="uppercase text-xs font-bold">Southern Plains Sport Dog Club</h4>
                            <h3 class="font-heading text-5xl mb-6">Your gateway to NASDA Competition.</h3>
                            <p class="text-base mb-2">We are licensed <span class="font-semibold">NASDA Club</span> dedicated to hosting high-quality, accessible trials in new and underserved areas. This is the perfect place to try out a sport organization before committing<br /> to full club membership.</p>

                            <x-primary-button color="club-dark" class="mt-6">
                                {{ __('View Trial Schedule') }}
                            </x-primary-button>

                        </div>
                    </div>
                    <div id="league" class="p-6 bg-league bg-cover bg-center"
                        style="background-image: url('{{ asset('images/left_mask.png') }}');">
                        <div class="lg:px-[120px] p-4">
                            <h4 class="uppercase text-xs font-bold">Southern Plains Sport Dog League</h4>
                            <h3 class="font-heading text-5xl mb-6">Friendly Competition, Fierce Team Spirit</h3>
                            <p class="text-base mb-2">The League provides a regular, local structure for competition and progress measurement. Join our organized events throughout the year to hone your sport skills and enjoy the camaraderie of fellow handlers. <span class="italic">(Formerly Redbud Sport Dog League)</span>.</p>
                            <x-primary-button color="league-dark" class="mt-6">
                                {{ __('Explore the League') }}
                            </x-primary-button>
                        </div>
                    </div>
                    <div id="train" class="p-6 bg-training bg-cover bg-center"
                        style="background-image: url('{{ asset('images/right_mask.png') }}');">
                        <div class="lg:px-[120px] p-4">
                            <h4 class="uppercase text-xs font-bold">Southern Plains Training</h4>
                            <h3 class="font-heading text-5xl mb-6">From Manners to Masters<br />Building a Solid Foundation</h3>
                            <p class="text-base mb-2">Our focus is positive-reinforcement training that builds confidence and reliable behavior. We offer core classes, including <span class="font-semibold">Basic Manners, Canine Good Citizen (CGC) preparation, Tricks</span>, and specialized workshops to strengthen your partnership.</p>
                            <x-primary-button color="train-dark" class="mt-6">
                                {{ __('View Current Offerings') }}
                            </x-primary-button>
                        </div>
                    </div>

                </div> <!-- END Scrollable Column -->


        </main>
    </div>

</body>

</html>
    <div class="bg-cover bg-top h-screen w-screen"
        style="background-image: url('{{ asset('images/coming_soon_bg.jpg') }}');">
        <div class="backdrop-blur-md h-full w-full flex items-center justify-center">
            <div class="flex items-center justify-center  bg-white/50 min-h-96">
                <div class="flex w-full max-w-4xl bg-cover bg-right-bottom min-h-96"
                    style="background-image: url('{{ asset('images/right_mask.png') }}');">

                    <div class="lg:p-[120px] p-4">
                        <div class="text-black flex text-black pb-8 justify-center items-center">
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

                        <!-- Begin Brevo Form -->
                        <!-- START - We recommend to place the below code in head tag of your website html  -->

                        <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">
                        <!--  END - We recommend to place the above code in head tag of your website html -->

                        <!-- START - We recommend to place the below code where you want the form in your website html  -->
                        <div class="sib-form" style="padding: 0px !important;">
                            <div id="sib-form-container">
                                <div id="error-message" class="sib-form-message-panel" style="font-size:11px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:0px; border-color:#ff4949;max-width:540px;">
                                    <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                                        <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
                                            <path d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z" />
                                        </svg>
                                        <span class="sib-form-message-panel__inner-text">
                                            Your subscription could not be saved. Please try again.
                                        </span>
                                    </div>
                                </div>
                                <div></div>
                                <div id="success-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#085229; background-color:#e7faf0; border-radius:0px; border-color:#13ce66;max-width:540px;">
                                    <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                                        <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
                                            <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" />
                                        </svg>
                                        <span class="sib-form-message-panel__inner-text">
                                            Your subscription has been successful.
                                        </span>
                                    </div>
                                </div>
                                <div id="sib-container" style="background: transparent !important; padding: 0px !important;">
                                    <form id="sib-form" method="POST" action="https://a7e86912.sibforms.com/serve/MUIFAEVrrxbebcKdzV34JTC1n-8USU8gszDeusfHsLDwTNTw3NhAmq5eK-r95cx-lzJCi9jccX6gABRR_GqPVRhi1qW8bKBvvd7SHbYzit3A_v3OUFCxFDz-RnJaE9S35h16JnkgtYy2PhehKa-Peoc442B5OX1WWf9w7G8uGhjUrSXIUx8fQkAvDJnP9ZF-CtvNa9tWScSVuiP8uw==" data-type="subscription">


                                        <div style="padding: 0px 0;">
                                            <div class="sib-input sib-form-block" style="padding: 0px !important">
                                                <div class="form__entry entry_block">


                                                    <div class="entry__field" style="padding: 0px !important; width:100% !important;">
                                                        <input class="input " type="text" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="Please enter your email address." data-required="true" required />
                                                    </div>

                                                    <label class="entry__error entry__error--primary" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:0px; border-color:#ff4949;">
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding: 8px 0;">
                                            <div class="g-recaptcha" data-sitekey="6Lea_eYrAAAAABcNsOhAw6zRZ39JRmKK8JSSXLHg" data-callback="invisibleCaptchaCallback" data-size="invisible" onclick="executeCaptcha"></div>
                                        </div>
                                        <div style="padding: 8px 0;">
                                            <div class="sib-form-block" style="text-align: left; padding: 0px !important;">
                                                <button class="sib-form-block__button sib-form-block__button-with-loader" style="font-size:10px; text-align:left; font-weight:700; font-family:Helvetica, sans-serif; color:#FFFFFF; background-color:#4CBB17;" form="sib-form" type="submit">
                                                    <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512" style="">
                                                        <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                                                    </svg>
                                                    SUBSCRIBE
                                                </button>
                                            </div>
                                        </div>

                                        <input type="text" name="email_address_check" value="" class="input--hidden">
                                        <input type="hidden" name="locale" value="en">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END - We recommend to place the above code where you want the form in your website html  -->
                        <!-- End Brevo Form -->

                    </div>
                </div>
            </div>

        </div>

</body>

</html>

<!-- START - We recommend to place the below code in footer or bottom of your website html  -->
<script>
    window.REQUIRED_CODE_ERROR_MESSAGE = 'Please choose a country code';
    window.LOCALE = 'en';
    window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "The information provided is invalid. Please review the field format and try again.";

    window.REQUIRED_ERROR_MESSAGE = "This field cannot be left blank. ";

    window.GENERIC_INVALID_MESSAGE = "The information provided is invalid. Please review the field format and try again.";




    window.translation = {
        common: {
            selectedList: '{quantity} list selected',
            selectedLists: '{quantity} lists selected',
            selectedOption: '{quantity} selected',
            selectedOptions: '{quantity} selected',
        }
    };

    var AUTOHIDE = Boolean(0);
</script>

<script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>

<script src="https://www.google.com/recaptcha/api.js?hl=en"></script>

<!-- END - We recommend to place the above code in footer or bottom of your website html  -->
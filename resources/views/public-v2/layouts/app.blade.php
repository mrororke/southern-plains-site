<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Southern Plains Sport Dog Club</title>

    <!-- TODO
    Don't forget to build in dynamic Meta Information
    We also need a favicon -->

    {{-- Brevo base styles --}}
    <link
        rel="stylesheet"
        href="https://sibforms.com/forms/end-form/build/sib-styles.css">

    {{-- Public V2 styles + scripts --}}
    @vite([
    'resources/css/public-v2.css',
    'resources/js/public-v2.js',
    ])

    {{-- Brevo message panels begin hidden.
         Brevo's JS controls their visibility after submission. --}}
    <style>
        :where(.sib-form-message-panel) {
            display: none;
        }
    </style>

</head>

<body class="bg-sp-warmIvory">

    <header class="header-topo">

       <x-public-v2.navigation />


        

    </header>

    <!-- END of header -->


    @yield('content')


    <footer>

       <x-public-v2.newsletter />


    {{-- Main Footer Row --}}
    <div class="grid grid-cols-12 gap-y-8 px-8 py-8 footer-topo">

        {{-- Logo --}}
        <div class="col-span-12 md:col-span-1">

            <x-logo class="w-32 h-auto" />

        </div>


        {{-- Mission --}}
        <div class="col-span-12 md:col-span-2">

            <p class="text-sp-slate md:px-4">
                Building better dog and handler teams through positive training, dog sports, and community.
            </p>

        </div>


        {{-- Explore --}}
        <div class="col-span-6 md:col-span-2 md:col-start-6">

            <h4 class="footer">
                Explore
            </h4>

            <ul class="footer-nav">
                <li>About</li>
                <li>Training</li>
                <li>Dog Sports</li>
                <li>Events</li>
                <li>Contact</li>
            </ul>

        </div>


        {{-- Resources --}}
        <div class="col-span-6 md:col-span-2">

            <h4 class="footer">
                Resources
            </h4>

            <ul class="footer-nav">
                <li>Getting Started</li>
                <li>Learn</li>
                <li>NASDA</li>
                <li>League Info</li>
                <li>Trick Dog</li>
            </ul>

        </div>


        {{-- Contact --}}
        <div class="col-span-12 md:col-span-2">

            <h4 class="footer">
                Contact
            </h4>

            <ul class="footer-nav">

                <li>
                    <x-icons.map-pin />
                    Inola, Oklahoma
                </li>

                <li>
                    <x-icons.mail />

                    <a
                        href="mailto:southernplainssportdogclub@gmail.com"
                        class="break-all">
                        southernplainssportdogclub@gmail.com
                    </a>
                </li>

            </ul>

        </div>

    </div>


    {{-- Legal Row --}}
    <div class="grid grid-cols-12 gap-y-4 px-8 py-8 bg-sp-prairieGreen">

        <div class="col-span-12 md:col-span-8 text-sp-warmIvory text-sm">
            Copyright © 2025 - 2026 Southern Plains Sport Dog Club, LLC. All rights reserved.
        </div>

        <div class="col-span-12 md:col-span-4 text-sp-warmIvory text-sm md:text-right">
            <a href="{{ route('login') }}">Login</a>
            /
            Privacy Policy
            /
            Terms of Use
        </div>

    </div>

</footer>

       


    {{-- Brevo Form Configuration --}}
    <script>
        window.REQUIRED_CODE_ERROR_MESSAGE =
            'Please choose a country code';

        window.LOCALE =
            'en';

        window.EMAIL_INVALID_MESSAGE =
            window.SMS_INVALID_MESSAGE =
            'The information provided is invalid. Please review the field format and try again.';

        window.REQUIRED_ERROR_MESSAGE =
            'This field cannot be left blank. ';

        window.GENERIC_INVALID_MESSAGE =
            'The information provided is invalid. Please review the field format and try again.';

        window.INVALID_NUMBER =
            'The information provided is invalid. Please review the field format and try again.';

        window.INVALID_DATE =
            'Please enter a valid date';

        window.REQUIRED_MULTISELECT_MESSAGE =
            'Please select at least 1 option';

        window.translation = {
            common: {
                selectedList: '{quantity} list selected',
                selectedLists: '{quantity} lists selected',
                selectedOption: '{quantity} selected',
                selectedOptions: '{quantity} selected',
            }
        };

        var AUTOHIDE = Boolean(1);
    </script>


    {{-- Brevo Form JavaScript --}}
    <script
        defer
        src="https://sibforms.com/forms/end-form/build/main.js">
    </script>

</body>

</html>
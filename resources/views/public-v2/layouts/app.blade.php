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


    <x-public-v2.footer />
       


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
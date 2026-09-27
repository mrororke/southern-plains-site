<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Primary Meta --}}
    <title>@yield('meta_title', 'Southern Plains Sport Dog Club')</title>

    <meta
        name="description"
        content="@yield('meta_description', 'Positive reinforcement dog training, dog sports, events, and resources in Oklahoma.')">

    <link
        rel="canonical"
        href="@yield('canonical_url', url()->current())">


    {{-- Open Graph --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Southern Plains Sport Dog Club">

    <meta
        property="og:title"
        content="@yield('og_title', 'Southern Plains Sport Dog Club')">

    <meta
        property="og:description"
        content="@yield('og_description', 'Positive reinforcement dog training, dog sports, events, and resources in Oklahoma.')">

    <meta
        property="og:url"
        content="@yield('canonical_url', url()->current())">

    <meta
        property="og:image"
        content="@yield('og_image', asset('images/og/default.jpg'))">


    {{-- Social Sharing --}}
    <meta name="twitter:card" content="summary_large_image">

    <meta
        name="twitter:title"
        content="@yield('og_title', 'Southern Plains Sport Dog Club')">

    <meta
        name="twitter:description"
        content="@yield('og_description', 'Positive reinforcement dog training, dog sports, events, and resources in Oklahoma.')">

    <meta
        name="twitter:image"
        content="@yield('og_image', asset('images/og/default.jpg'))">


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
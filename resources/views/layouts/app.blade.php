<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- SEO SLOTS FOR TITLE AND DESCRIPTION --}}
    <title>@yield('metaTitle', 'Southern Plains Sport Dog Club, LLC. | Serving NE Oklahoma.')</title>
    <meta name="description" content="@yield('metaDescription', 'Positive reinforcement dog training, NASDA, and sport dog competition in Northeastern Oklahoma.')">

    {{-- 2. OPEN GRAPH (OG) TAGS: For Facebook, LinkedIn, WhatsApp, etc. --}}
    <meta property="og:title" content="@yield('metaTitle')">
    <meta property="og:description" content="@yield('metaDescription')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    {{-- TODO: Verify OG Image Works on Production --}}
    <meta property="og:image" content="@yield('ogImage', asset('images/og-images/default-social-share.jpg'))"> 
    <meta property="og:locale" content="en_US">
    
    </head>
<body>
    
    {{-- THIS IS THE MAIN CONTENT SLOT --}}
    @yield('content')
    
    {{-- SCRIPT INCLUDES --}}
    <script>
        window.REQUIRED_CODE_ERROR_MESSAGE = 'Please choose a country code';
        // ... all the rest of your window.translation/AUTOHIDE script setup ...
    </script>
    <script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=en"></script>
    
</body>
</html>
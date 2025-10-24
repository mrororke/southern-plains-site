<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- SEO SLOTS FOR TITLE AND DESCRIPTION --}}
    <title>@yield('metaTitle', 'Southern Plains Sport Dog Club, LLC. | Serving NE Oklahoma.')</title>
    <meta name="description" content="@yield('metaDescription', 'Positive reinforcement dog training, NASDA, and sport dog competition in Northeastern Oklahoma.')">
    
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
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Southern Plains Dog Sport Club, LLC. | Serving Rogers, Mayes, and Wagoner Counties.</title>

        <!-- Fonts -->
         @googlefonts

         <!-- Styles -->
          @vite(['resources/css/app.css', 'resources/js/app.js'])

        
    </head>
    <body class="antialiased">
        <p class="font-sans text-base dark:text-white">
    This paragraph text should be styled with Archivo.
</p>

<h1 class="font-heading text-4xl dark:text-white">
    This headline text should be styled with Bebas Neue.
</h1>
        
    </body>
</html>

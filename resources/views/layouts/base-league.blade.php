<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO SLOTS: This is the dynamic title for search engines and browser tabs --}}
    <title>@yield('metaTitle', 'Southern Plains Sport Dog Club | NE Oklahoma Training & NASDA')</title>
    <meta name="description" content="@yield('metaDescription', 'Positive reinforcement dog training, NASDA competition, and community in the Northeastern Oklahoma area.')">

    {{-- SOCIAL SHARING IMAGE --}}
    <meta property="og:image" content="@yield('ogImage', asset('images/og-images/default-social-share.jpg'))">

    {{-- Add your main CSS/Tailwind includes here, e.g., <link href="/css/app.css" rel="stylesheet"> --}}
</head>

<body>

    {{--
| ----------------------------------------------------
| DATA DEFINITIONS - SLOT
| This slot is used to define PHP variables (like $slidesData) before any components that need them are called.
| ----------------------------------------------------
--}}
    @yield('data_definitions')

    <x-app-league-header />

    <main>
        {{-- 💡 FLEX CONTAINER: This enables the side-by-side layout for pages with a slider --}}
        <div class="flex min-h-screen">
            
            {{-- 💡 NEW SLOT FOR THE STICKY SLIDER COLUMN --}}
            @yield('slider_column')

            {{-- 💡 MAIN CONTENT COLUMN: Its width shrinks if the slider column is present --}}
            <div class="@hasSection('slider_column') w-full lg:w-2/3 @else w-full @endif flex-shrink-0 overflow-y-auto">

                <div class="lg:px-[120px] p-4">

                    {{-- 💡 START OF PAGE-SPECIFIC CONTENT SLOT (e.g., about text, contact form) --}}
                    @yield('page_content')
                    {{-- 💡 END OF PAGE-SPECIFIC CONTENT SLOT --}}

                </div>
                
                {{-- 💡 OPTIONAL BLOCKS: These sections will be called only when needed by specific pages --}}
                @yield('highlight_blocks')
                @yield('feature_blocks')
                @yield('testimonial_blocks')


                <x-app-footer-league />
            </div>

        </div>
    </main>


    {{--
| ----------------------------------------------------
| SCRIPTS (Must be before the closing </body> tag)
| ----------------------------------------------------
--}}
    <script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=en"></script>
    {{-- Add any other site-wide scripts here --}}

</body>

</html>
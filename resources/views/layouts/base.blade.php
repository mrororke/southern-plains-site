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
| PAGE CONTENT 
| ----------------------------------------------------
--}}

    <x-app-header />

    <main>
        <div class="flex">
            
            {{-- 💡 This is where the main content will go on ALL pages --}}
            <div class="w-full flex-shrink-0">

                <div class="lg:px-[120px] p-4">

                    {{-- 💡 START OF PAGE-SPECIFIC CONTENT SLOT --}}
                    @yield('page_content')
                    {{-- 💡 END OF PAGE-SPECIFIC CONTENT SLOT --}}

                </div>
                
                {{-- 💡 These sections will be called only when needed by specific pages --}}
                @yield('highlight_blocks')
                @yield('feature_blocks')
                @yield('testimonial_blocks')


                <div id="footer" class="p-6 bg-club">
                    <div class="lg:px-[120px] p-4">
                        <div class="grid md:grid-cols-4 gap-4">

                            {{-- Contact and Social Info (Col 1) --}}
                            <x-shared.footer-contact-info />

                            {{-- Explore Links (Col 2) --}}
                            <x-shared.footer-explore-links />

                            {{-- Newsletter Signup (Cols 3 & 4) --}}
                            <x-shared.newsletter-signup />

                        </div>

                        {{-- Copyright Text (Always at the bottom) --}}
                        <div class="mt-8">
                            <p class="text-xs">Copyright &copy; 2025 - 2026 Southern Plains Sport Dog Club, LLC. All rights. reserved.<br />
                                By using this site, you agree to our Terms of Service and Privacy Policy. For copyright, accessibility inquiries, or other policies, visit our Legal & Policies Hub, or contact us at <a href="mailto:southernplainssportsdogclub@gmail.com">southernplainssportsdogclub@gmail.com</a></p>
                        </div>
                    </div>
                </div>
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
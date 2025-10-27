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

    <nav class="mt-6 z-10" x-data="{ open: false }">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        <div class="text-black">
                            <a href="/">
                                <x-application-logo class="w-20 h-20 fill-current" />
                            </a>
                        </div>
                        <x-shared.desktop-nav-links />

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

                    <x-shared.mobile-nav-links />
                </div>
            </nav>

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
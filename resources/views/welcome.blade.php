@extends('layouts.app') 

@section('metaTitle', 'Positive Dog Training and Dog Sports in NE Oklahoma')

@section('metaDescription', 'Comprehensive positive-reinforcement dog training, sport, and community in the Northeastern Oklahoma area. Join our NASDA club, league, and manners classes.')

@section('content') {{-- START: This content will fill the @yield('content') slot --}}

@php
$slidesData = [
['path' => 'images/2025_01_slide_hamish.jpg', 'alt' => 'A photo of Hamish, a Shetland Sheepdog, when he was six months old.'],
// ... rest of your slidesData ...
];
@endphp

<x-app-header />

<main>
    <div class="flex min-h-screen">
        <x-home.sticky-slider-column :slides="$slidesData" />

        <div class="w-full lg:w-2/3 flex-shrink-0 overflow-y-auto">

            {{-- ... the rest of your home page content, data, and components ... --}}
            
            <div class="lg:px-[120px] p-4">
                <x-home.home-hero-text />
                <x-home.choose-path-section :paths="$pathsData" />
            </div>

            @foreach ($highlightBlocks as $block)
                <x-shared.info-highlight-block
                    {{-- ... props ... --}}
                />
            @endforeach

            {{-- ... other sections and components ... --}}

            <x-home.testimonial-carousel-section :testimonials="$testimonialsData" />

            <div id="footer" class="p-6 bg-club">
                <div class="lg:px-[120px] p-4">
                    {{-- ... footer grid and content ... --}}
                    <x-shared.footer-contact-info />
                    <x-shared.footer-explore-links />
                    <x-shared.newsletter-signup />
                    {{-- ... copyright text ... --}}
                </div>
            </div> </div> </div>
</main>

@endsection {{-- END: Content section --}}
@extends('layouts.base')

{{-- 
| ----------------------------------------------------
| SEO SLOTS
| ----------------------------------------------------
--}}

@section('metaTitle', 'About Us | Mission, Instructor, and Training Philosophy')
@section('metaDescription', 'Learn about Southern Plains Sport Dog Club\'s mission, meet lead instructor Melanie O\'Rorke, and understand our positive reinforcement training philosophy.')


{{-- 
| ----------------------------------------------------
| DATA DEFINITIONS - MOVED INTO THE LAYOUT SLOT
| ----------------------------------------------------
--}}
@section('data_definitions')
    @php
    // 1. SLIDES DATA (REQUIRED FOR SLIDER_COLUMN SECTION)
    $slidesData = [
    ['path' => 'images/2025_01_slide_hamish.jpg', 'alt' => 'A photo of Hamish, a Shetland Sheepdog, when he was six months old.'],
    ['path' => 'images/2025_02_slide_hamish.jpg', 'alt' => 'Hamish, a black and white Shetland Sheepdog, at six months old.'],
    ['path' => 'images/2025_03_slide_hamish.jpg', 'alt' => 'Hamish, a Shetland Sheepdog, when he was four months old.'],
    ];

    // 2. SVG/FEATURES DATA 
    $svgCompassion = '<svg width="48" height="42" class="mb-4 mx-auto" viewBox="0 0 48 42" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 14.4375V13.9688C0 7.40625 4.6875 1.78125 11.1562 0.75C15.375 0 19.7812 1.40625 22.875 4.5L24 5.53125L25.0312 4.5C28.125 1.40625 32.5312 0 36.75 0.75C43.2188 1.78125 48 7.40625 48 13.9688V14.4375C48 18.375 46.3125 22.125 43.5 24.75L26.5312 40.5938C25.875 41.25 24.9375 41.5312 24 41.5312C22.9688 41.5312 22.0312 41.25 21.375 40.5938L4.40625 24.75C1.59375 22.125 0 18.375 0 14.4375Z" fill="#FF0398"/>
</svg>';
    $svgScienceBased = '<svg width="60" height="48" class="mb-4 mx-auto" viewBox="0 0 60 48" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M59.8125 20.3438C59.9062 20.5312 60 20.8125 60 20.9062C60 21.4688 59.5312 22.125 59.0625 22.3125L48 26.9062C47.9062 26.9062 47.625 27 47.4375 27C46.875 27 46.3125 26.625 46.0312 26.0625L38.0625 6.65625C37.9688 6.5625 37.875 6.28125 37.875 6.09375C37.875 5.53125 38.3438 4.96875 38.8125 4.6875L49.875 0.1875C49.9688 0.09375 50.25 0 50.4375 0C51 0 51.5625 0.46875 51.8438 1.03125L59.8125 20.3438ZM35.625 8.71875L42.8438 26.3438L36.6562 28.5C36.6562 28.5 36.6562 28.5 36.6562 28.5938C36.6562 30.0938 36.0938 31.5938 35.1562 32.7188L39.4688 45C39.9375 46.2188 39.2812 47.5312 38.1562 47.9062C37.875 48 37.5938 48 37.4062 48C36.5625 48 35.625 47.4375 35.25 46.5L31.2188 35.1562C30.75 35.25 30.375 35.25 29.9062 35.25C29.4375 35.25 28.9688 35.25 28.5 35.1562L24.4688 46.5C24.1875 47.4375 23.25 48 22.4062 48C22.2188 48 21.9375 48 21.75 47.8125C20.5312 47.4375 19.875 46.125 20.3438 45L24.6562 32.7188V32.625L12.75 36.75C11.9062 37.0312 11.0625 36.6562 10.6875 35.9062L9.9375 33.9375L3.9375 36.4688C3.75 36.5625 3.46875 36.5625 3.375 36.5625C2.8125 36.5625 2.15625 36.1875 1.96875 35.625L0.09375 31.125C0 30.9375 0 30.6562 0 30.5625C0 30 0.375 29.3438 0.84375 29.1562L6.84375 26.625L6.09375 24.6562C5.71875 23.9062 6.09375 23.0625 6.9375 22.6875L35.625 8.71875ZM29.9062 30.75C31.2188 30.75 32.1562 29.8125 32.1562 28.5C32.1562 27.1875 31.125 26.25 29.9062 26.25C28.5938 26.25 27.6562 27.1875 27.6562 28.5C27.6562 29.7188 28.5938 30.75 29.9062 30.75Z" fill="#FF0398"/>
</svg>';
    $svgRelationship = '<svg width="55" height="48" class="mb-4 mx-auto" viewBox="0 0 55 48" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M31.5 1.875C31.6875 0.84375 32.625 0 33.75 0C34.4062 0 35.0625 0.375 35.5312 0.9375L37.125 3H42C43.125 3 44.3438 3.5625 45.1875 4.40625L46.875 6H52.125C53.3438 6 54.375 7.03125 54.375 8.25V10.5C54.375 14.7188 51 18 46.875 18H40.3125L39.8438 20.9062L29.3438 14.9062L31.5 1.875ZM42.375 6C41.5312 6 40.875 6.75 40.875 7.5C40.875 8.34375 41.5312 9 42.375 9C43.125 9 43.875 8.34375 43.875 7.5C43.875 6.75 43.125 6 42.375 6ZM39.375 24.0938V45C39.375 46.6875 37.9688 48 36.375 48H33.375C31.6875 48 30.375 46.6875 30.375 45V34.2188C28.0312 35.4375 25.5 36 22.875 36C20.1562 36 17.625 35.4375 15.375 34.2188V45C15.375 46.6875 13.9688 48 12.375 48H9.375C7.6875 48 6.375 46.6875 6.375 45V23.4375C3.65625 22.4062 1.5 20.1562 0.75 17.25L0.375 15.75C0 14.1562 1.03125 12.5625 2.625 12.0938C4.21875 11.7188 5.8125 12.75 6.28125 14.3438L6.5625 15.75C6.9375 17.0625 8.15625 18 9.46875 18H28.7812L39.375 24.0938Z" fill="#FF0398"/>
</svg>';
    

    $featuresData = [
        [
        'svg' => $svgCompassion,
        'title' => 'Compassion First',
        'content' => "We believe in humane, understanding methods that honor each dog’s unique temperament and needs, fostering trust and positive emotional well-being above all else.",
        ],
        [
        'svg' => $svgScienceBased,
        'title' => 'Science-Based Effectiveness',
        'content' => 'Our training solutions are rooted in the latest canine behavior science and positive reinforcement techniques, ensuring lasting and reliable results for real-world challenges.',
        ],
        [
        'svg' => $svgRelationship,
        'title' => 'Harmonious Relationship',
        'content' => 'Beyond teaching cues, we focus on empowering dogs and owners to overcome obstacles together, cultivating the deep trust needed to build a calm, cooperative, and enriching life for both partners.',
        ]
    ];

    @endphp
@endsection


{{--
| ----------------------------------------------------
| SLIDER COLUMN SECTION - Calls the sticky component
| ----------------------------------------------------
--}}
@section('slider_column')
    {{-- Passes the $slidesData defined in the data_definitions section --}}
    <x-home.sticky-slider-column :slides="$slidesData" />
@endsection


{{-- 
| ----------------------------------------------------
| PAGE-SPECIFIC CONTENT (Goes inside the main padded wrapper)
| ----------------------------------------------------
--}}
@section('page_content')

    <div class="prose max-w-none text-lg text-black">
        <h4 class="uppercase text-xs font-bold">About Southern Plains Sport Dog Club</h4>
<h1 class="font-heading text-7xl">Our Story.<br/>Your Transformation.</h1>

<p class="text-base mb-2">The path to Southern Plains began with a powerful, unexpected teacher: Luka, a spirited European-bred Doberman who entered my life in 2020. What started as a dream of a versatile canine partner quickly evolved into something far more profound. Through his unique challenges and triumphs, Luka sparked a journey of discovery that now fuels our mission to empower other dogs and their owners.</p>
    </div>

    <div class="grid grid-cols-2 mt-6 mb-6">
        <div>
            <h3 class="font-heading text-5xl mb-6">The heart behind our mission</h3>
            <p class="text-base mb-2">
                From the outset, Luka’s intelligence and eagerness to learn ignited my dedication to positive reinforcement. We embraced clicker training, and Luka flourished, rapidly mastering cues and even earning his Novice Trick Dog title at just six months old.
            </p>
            <p class="text-base mb-2">
                However, our journey wasn’t without its challenges. Attempts to achieve his AKC Canine Good Citizen title revealed Luka’s underlying anxieties and reactive tendencies. This was a pivotal moment—it taught me the profound truth of training the dog before me, not the dog I had initially envisioned. This realization spurred an intensive exploration of canine behavior and positive methods, ultimately becoming the catalyst for my professional certification.
            </p>
        </div>
        <div>
            <img src="{{ asset('images/about-luka.jpg') }}" 
             alt="Luka von Hagedorn, September 21, 2020 - July 9, 2025" 
             class="w-full ml-4  shadow-lg">
        </div>
    </div>


@endsection


{{-- 
| ----------------------------------------------------
| RE-USED SECTIONS (These blocks will be pulled in below the main content)
| ----------------------------------------------------
--}}

{{-- Re-uses the Why Us section from the home page, using the $featuresData defined above --}}
@section('feature_blocks')
    <x-shared.three-column-feature :features="$featuresData" />
@endsection

@section('testimonial_blocks')
    <div class="grid grid-cols-2 mt-6 mb-6">
        <div>
            <h3 class="font-heading text-5xl mb-6">The heart behind our mission</h3>
            <p class="text-base mb-2">
                From the outset, Luka’s intelligence and eagerness to learn ignited my dedication to positive reinforcement. We embraced clicker training, and Luka flourished, rapidly mastering cues and even earning his Novice Trick Dog title at just six months old.
            </p>
            <p class="text-base mb-2">
                However, our journey wasn’t without its challenges. Attempts to achieve his AKC Canine Good Citizen title revealed Luka’s underlying anxieties and reactive tendencies. This was a pivotal moment—it taught me the profound truth of training the dog before me, not the dog I had initially envisioned. This realization spurred an intensive exploration of canine behavior and positive methods, ultimately becoming the catalyst for my professional certification.
            </p>
        </div>
        <div>
            <img src="{{ asset('images/about-luka.jpg') }}" 
             alt="Luka von Hagedorn, September 21, 2020 - July 9, 2025" 
             class="w-full ml-4  shadow-lg">
        </div>
    </div>
@endsection('testimonial_blocks')



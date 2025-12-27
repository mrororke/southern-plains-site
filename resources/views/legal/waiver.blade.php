@extends('layouts.base')

{{-- 
| ----------------------------------------------------
| SEO SLOTS
| ----------------------------------------------------
--}}

@section('ogImage', asset('images/2025_01_slide_hamish.jpg'))
{{-- The <title> and <meta description> default to the base layout --}}


{{--
| ----------------------------------------------------
| DATA DEFINITIONS - MOVED INTO THE LAYOUT SLOT
| ----------------------------------------------------
--}}
@section('data_definitions')
    @php
    // 1. SLIDES DATA
    $slidesData = [
    ['path' => 'images/2026_01_hamish_01.jpg', 'alt' => 'Hamish, a black bi-color Shetland Sheepdog, photo by Blue Ridge Prairie Photography.'],
    ['path' => 'images/2026_01_hamish_02.jpg', 'alt' => 'Hamish, a black bi-color Shetland Sheepdog, photo by Blue Ridge Prairie Photography.'],
    ['path' => 'images/2026_01_hamish_03.jpg', 'alt' => 'Hamish, a black bi-color Shetland Sheepdog, photo by Blue Ridge Prairie Photography.'],
    ['path' => 'images/2026_01_hamish_04.jpg', 'alt' => 'Hamish, a black bi-color Shetland Sheepdog, photo by Blue Ridge Prairie Photography.'],
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
<h4 class="uppercase text-xs font-bold">Southern Plains Sport Dog Club</h4>
<h1 class="font-heading text-7xl">Liability Waiver & Release of Liability.</h1>

<p class="text-base mb-4"><strong>NOTICE:</strong> By participating in any Southern Plains Sport Dog Club event, including Wander Club meetups and League Training Days, you acknowledge and agree to the following:
<ul class="list-decimal list-inside mb-4">
<li><strong>Voluntary Participation:</strong> I acknowledge that I have voluntarily applied to participate in dog training and/or community activities organized by Southern Plains Sport Dog Club.</li>

<li><strong>Assumption of Risk:</strong> I understand that working with dogs and hiking in wilderness areas (such as Turkey Mountain) involves inherent risks, including but not limited to: dog bites, scratches, falls, wildlife encounters, and weather-related injuries. I voluntarily assume all risks associated with my participation and my dog’s participation.</li>

<li><strong>Handler Responsibility:</strong> I agree that I am solely responsible for the conduct and actions of my dog at all times. I agree to maintain control of my dog and adhere to all leash laws and event-specific gear requirements.</li>

<li><strong>Release of Liability:</strong> I hereby release, waive, and discharge Southern Plains Sport Dog Club, its organizers, volunteers, and property owners from any and all liability, claims, or demands for personal injury, property damage, or wrongful death arising out of my participation in club activities.</li>
</ul></p>


@endsection



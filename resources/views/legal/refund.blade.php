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
<h1 class="font-heading text-7xl">Refund & Cancellation Policy.</h1>

<p class="text-base mb-4">Effective Date: January 1, 2026</p>

<p class="text-base mb-4">Southern Plains Sport Dog Club (“Southern Plains,” “we,” “us,” or “our”) respects your privacy and is committed to protecting the personal information you share with us. This Privacy Policy outlines how we collect, use, and safeguard your data when you visit our website (the “Site”).</p>



@endsection



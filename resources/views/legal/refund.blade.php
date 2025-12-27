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

<p class="text-base mb-4">
<ul class="list-decimal list-inside mb-4">
<li><strong>League & Event Registration:</strong>
<ul class="list-disc list-inside mb-4">
<li>Cancellations made more than 7 days prior to an event are eligible for a full refund or credit toward a future event.</li>
<li>Cancellations made within 2-7 days of an event are eligible for a 50% refund.</li>
<li>Cancellations made less than 48 hours before an event are non-refundable.</li>
</ul>
</li>

<li><strong>Private Training:</strong><br/>
24-hour notice is required to reschedule or cancel a private lesson without penalty. Late cancellations will be charged the full session fee.</li>

<li><strong>Club Cancellations:</strong>
If Southern Plains cancels an event due to extreme weather (e.g., Oklahoma heat advisories or ice) or instructor illness, a full refund or rescheduled date will be provided.</li>


</ul></p>



@endsection



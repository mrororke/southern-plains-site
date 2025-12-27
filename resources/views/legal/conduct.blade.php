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
<h1 class="font-heading text-7xl">Community & Training Guidelines.</h1>

<p class="text-base mb-4">Effective Date: January 1, 2026</p>

<p class="text-base mb-4">To ensure a safe and productive environment for all teammates, all participants must adhere to the following standards:
<ul class="list-decimal list-inside mb-4">
<li><strong>The "Three-Foot" Rule:</strong> Always ask for permission before allowing your dog to approach another dog or person. Not all teammates are social; some are here for focused training.</li>

<li>Gear Requirements:
<ul class="list-disc list-inside mb-4">
<li>No retractable (flexi) leashes are permitted at group meetups or trials.</li>
<li>Standard flat collars, martingales, or harnesses are required.</li>
<li><strong>Prong collars, e-collars, and slip leads are strictly prohibited at all Southern Plains events.</strong></li>
</ul>
</li>
<li><strong>Force-Free Training Philosophy:</strong> Southern Plains is a positive reinforcement and force-free organization. We believe in building a partnership based on trust and communication.</li>

<li>Use of "jackpot" rewards (high-value treats, toys, or play) is highly encouraged.</li>

<li>Force, fear, and pain are not used or tolerated. Harsh physical corrections, "alpha rolls," or intimidation tactics will result in immediate removal from the event.</li>

<li><strong>Environment Stewardship:</strong> Pack it in, pack it out. Always pick up after your dog and stay on designated trails during Wander Club outings.</li>
</ul>

</p>



@endsection



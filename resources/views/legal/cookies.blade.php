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
<h1 class="font-heading text-7xl">Cookie Policy</h1>

<p class="text-base mb-4">Last Updated: January 1, 2026</p>

<p class="text-base mb-4">This Cookie Policy explains how Southern Plains Sport Dog Club uses cookies and similar technologies to recognize you when you visit our website.</p>

<p class="text-base mb-4"><strong>1. What are cookies?</strong><br/>

Cookies are small data files that are placed on your computer or mobile device when you visit a website. They are widely used by website owners to make their websites work, or to work more efficiently, as well as to provide reporting information.</p>

<p class="text-base mb-4"><strong>2. Why do we use cookies?</strong><br/>

We use first-party and third-party cookies for several reasons:
<ul class="list-disc list-inside mb-4">
<li><strong>Essential Cookies:</strong> These are strictly necessary to provide you with services available through our Site (such as logging into your member account).</li>
<li><strong>Performance and Functionality Cookies:</strong> These are used to enhance the performance and functionality of our Site but are non-essential to its use.</li>
<li><strong>Analytics and Customization Cookies:</strong> These collect information that is used either in aggregate form to help us understand how our Site is being used (e.g., Google Analytics) or to help us customize our Site for you.</li>
</ul>
</p>

<p class="text-base mb-4"><strong>3. How can I control cookies?</strong><br/>
You have the right to decide whether to accept or reject cookies. You can set or amend your web browser controls to accept or refuse cookies. If you choose to reject cookies, you may still use our website though your access to some functionality and areas of our website may be restricted.</p>

<p class="text-base mb-4"><strong>4. Third-Party Cookies</strong><br/>

In addition to our own cookies, we may also use various third-party cookies to report usage statistics of the Site (like Brevo for email tracking or Google Analytics).</p>



@endsection



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
<h1 class="font-heading text-7xl">Terms of Service.</h1>

<p class="text-base mb-4">Effective Date: January 1, 2026</p>

<p class="text-base mb-4">Welcome to Southern Plains Sport Dog Club (“Southern Plains,” “we,” “us,” or “our”). These Terms of Service (“Terms”) govern your access to and use of our website (the “Site”), including our blog, training resources, and community features. By accessing or using the Site, you agree to be bound by these Terms.</p>

<p class="text-base mb-4"><strong>1. The Southern Plains Philosophy</strong><br/>
Southern Plains is dedicated to the bond between handlers and their dogs. We advocate for the "train the dog in front of you" philosophy. Our content and community are designed for responsible handlers committed to the sports, health, and well-being of their teammates.</p>

<p class="text-base mb-4"><strong>2. Community Standards & Conduct</strong><br/>

As a member of our community or a participant in our Wander Club meetups, you agree to:
<ul class="list-disc list-inside mb-4">
<li>Treat all handlers and dogs with respect.</li>
<li>Adhere to all local laws and trail regulations (including leash laws).</li>
<li>Maintain a safe environment for your teammate and others.</li>
<li>Refrain from using the Site to post harmful, offensive, or harassing content.</li>
</ul>
</p>

<p class="text-base mb-4"><strong>3. Training & Content Disclaimer</strong><br/>
The content provided on this Site, including blog posts regarding canine behavior, NASDA trials, and the Wander Club, is for informational and educational purposes only.
<ul class="list-disc list-inside mb-4">
<li><strong>No Professional Guarantee:</strong> While we strive for accuracy, canine training involves inherent risks. Results vary based on the individual dog and handler.</li>
<li><strong>Health & Safety:</strong> Always consult with a qualified veterinarian or professional trainer before beginning a new physical activity or training regimen with your dog.</li>
</ul></p>

<p class="text-base mb-4"><strong>4. User Accounts & Memberships</strong></br>
If you create an account or join a members-only section of the Site:
<ul class="list-disc list-inside mb-4">
<li>You are responsible for maintaining the confidentiality of your account credentials.</li>
<li>You agree to provide accurate information and update it as necessary.</li>
<li>We reserve the right to suspend or terminate accounts that violate these Terms or our community standards.</li>
<ul></p>

<p class="text-base mb-4"><strong>5. Intellectual Property</strong></br>

All content on this Site—including text, photographs (including images of Luka, Hamish, and Moose), logos, and training materials—is the property of Southern Plains or its content creators and is protected by copyright laws. You may not reproduce or distribute this content without express written permission.</p>

<p class="text-base mb-4"><strong>6. External Links & Third-Party Tools</strong><br/>
Our Site may link to third-party services (such as NASDA, Linktree, or Brevo). We are not responsible for the content or privacy practices of these external sites.</p>

<p class="text-base mb-4"><strong>7. Limitation of Liability</strong><br/>
To the maximum extent permitted by law, Southern Plains shall not be liable for any direct, indirect, or incidental damages resulting from your use of the Site, participation in events, or reliance on any information provided on the Site.</p>

<p class="text-base mb-4"><strong>8. Changes to Terms</strong><br/>
We reserve the right to modify these Terms at any time. Significant changes will be communicated via our newsletter or a notice on our homepage. Your continued use of the Site after such changes constitutes acceptance of the new Terms.</p>

<p class="text-base mb-4"><strong>9. Contact Us</strong><br/>

If you have questions regarding these Terms, please contact us via our 
<a href="{{ route('contact.create') }}"
    title="Contact Us"
   style="color: #4CBB17; text-decoration:underline;">
Contact Page</a>.</p>

@endsection



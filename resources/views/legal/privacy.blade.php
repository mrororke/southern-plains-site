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
<h1 class="font-heading text-7xl">Privacy Policy.</h1>

<p class="text-base mb-4">Effective Date: January 1, 2026</p>

<p class="text-base mb-4">Southern Plains Sport Dog Club (“Southern Plains,” “we,” “us,” or “our”) respects your privacy and is committed to protecting the personal information you share with us. This Privacy Policy outlines how we collect, use, and safeguard your data when you visit our website (the “Site”).</p>

<p class="text-base mb-4"><strong>1. Information We Collect</strong><br/>

We collect information that you voluntarily provide to us, including:
<ul class="list-disc list-inside mb-4">
<li><strong>Contact Information:</strong> Name, email address, and phone number when you fill out our contact form or subscribe to our newsletter.</li>
<li><strong>Account Information:</strong> If you create an account (for future membership features), we collect your username and password.</li>
<li><strong>Communication Preferences:</strong> Your preferences in receiving marketing and community updates from us.</li>
</ul>
</p>

<p class="text-base mb-4"><strong>2. How We Use Your Information</strong><br/>

We use the collected data to:
<ul class="list-disc list-inside mb-4">
<li>Respond to your inquiries submitted via our <a href="{{ route('contact.create') }}"
    title="Contact Us"
   style="color: #4CBB17; text-decoration:underline;">
Contact Page</a>.</li>
<li>Send you our newsletter and community updates (primarily via Brevo).</li>
<li>Manage your participation in the Southern Plains League or Wander Club.</li>
<li>Improve our Site content, training resources, and user experience.</li>
</ul></p>

<p class="text-base mb-4"><strong>3. Data Storage & Third-Party Services</strong><br/>

We do not sell your personal information. However, we use trusted third-party service providers to help operate our Site:
<ul class="list-disc list-inside mb-4">
<li><strong>Email Marketing:</strong> We use Brevo to manage our subscriber lists and send automated email campaigns.</li>
<li><strong>Analytics:</strong> We may use tools like Google Analytics to understand Site traffic and usage patterns.</li>
<li><strong>Hosting:</strong> Our Site is hosted on secure servers (Cloudways) to ensure data integrity.</li>
</ul></p>

<p class="text-base mb-4"><strong>4. Cookies and Tracking</strong><br/>
Our Site uses cookies to enhance your browsing experience. Cookies are small files stored on your device that help us remember your preferences and understand how you interact with our content. You can manage or disable cookies through your browser settings.</p>

<p class="text-base mb-4"><strong>5. Data Security</strong><br/>
We implement industry-standard security measures to protect your data. However, no method of transmission over the internet is 100% secure. While we strive to protect your personal information, we cannot guarantee its absolute security.</p>

<p class="text-base mb-4"><strong>6. Your Rights & Choices</strong><br/>

You have the right to:
<ul class="list-disc list-inside mb-4">
<li><strong>Unsubscribe:</strong> You can opt-out of our marketing emails at any time by clicking the "unsubscribe" link at the bottom of our emails.</li>
<li><strong>Access/Correct Data:</strong> You may request to view or update the personal information we have on file for you.</li>
<li><strong>Data Deletion:</strong> You may request that we delete your personal data, subject to certain legal obligations.</li></ul>
</p>

<p class="text-base mb-4"><strong>7. Children’s Privacy</strong><br/>

Our Site is not intended for children under the age of 13. We do not knowingly collect personal information from children. If we become aware that a child has provided us with personal data, we will take steps to delete it.</p>

<p class="text-base mb-4"><strong>8. Changes to This Policy</strong><br/>

We may update this Privacy Policy periodically to reflect changes in our practices or for legal reasons. The "Effective Date" at the top will indicate when the latest changes were made.</p>

<p class="text-base mb-4"><strong>9. Contact Us</strong><br/>
If you have questions regarding this Privacy Policy, please contact us via our 
<a href="{{ route('contact.create') }}"
    title="Contact Us"
   style="color: #4CBB17; text-decoration:underline;">
Contact Page</a>.</p>


@endsection



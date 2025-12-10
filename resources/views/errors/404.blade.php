@extends('layouts.blog-base')

@section('page_content')
<!-- 1. FULL-WIDTH CONTAINER: 
     - Negates the parent padding (lg:px-[120px] p-4) by using the correct negative margins.
     - This forces the container to take up the full width of the main content column.
     - We include overflow-hidden to contain the floated image and prevent footer overlap. -->
<div class="
    mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px] 
    pt-10 pb-10 bg-gray-100 
    relative overflow-hidden
">
    <!-- 2. ALIGNMENT WRAPPER: 
     - Re-applies the original site padding (lg:px-[120px] p-4).
     - We only want the text to respect the LEFT padding, and the image to break the RIGHT padding. -->
    <div class="lg:pl-[120px] p-4 pl-4">

        <!-- Image: 
            - Floated right.
            - ml-8 provides space between Hamish and the text.
            - mr-[-1rem] negates the p-4 right padding on small screens.
            - lg:mr-[-120px] negates the correct 120px right padding on large screens. -->
        <img src="{{ asset('images/error-hamish.png') }}"
            alt="Hamish"
            class="float-right ml-8 mr-[-1rem] lg:mr-[-120px] max-w-xs">

        <!-- Headlines: These are now aligned correctly with the rest of your site -->
        <h4 class="uppercase text-xs font-bold">Ask Us Anything</h4>
        <h1 class="font-heading text-7xl">Get in Touch With<br />Southern Plains.</h1>

        <!-- 3. CLEARFIX: Use clear-both inside the alignment wrapper to stop the float 
           before the section ends, preventing footer breakage. -->
        <div class="clear-both"></div>
    </div>

</div>
@endsection
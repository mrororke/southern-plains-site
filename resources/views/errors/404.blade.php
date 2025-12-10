@extends('layouts.blog-base')

@section('page_content')
<!-- 1. FULL-WIDTH CONTAINER: Uses negative margins to bust out of parent padding.
        We've included the pt/pb here and a background color (bg-gray-100) to visually
        confirm it spans the full viewport width. -->
<div class="mx-[-1rem] lg:ml-[-105px] lg:mr-[-95px] pt-10 pb-10 bg-gray-100">

    <!-- 2. ALIGNMENT WRAPPER: Re-applies the original positive padding (p-4, lg:pl-[105px], etc.)
        This ensures the text and image stay aligned with the rest of your site content. -->
    <div class="lg:pl-[105px] lg:pr-[95px] p-4 clearfix">

        <!-- Image: Floated right, with margin-left for spacing. -->
        <img src="{{ asset('images/error-hamish.png') }}"
            alt="Hamish"
            class="float-right ml-8 max-w-xs"> <!-- Added max-w-xs and ml-8 -->

        <!-- Headlines: These are now aligned correctly due to the parent's padding -->
        <h4 class="uppercase text-xs font-bold">Ask Us Anything</h4>
        <h1 class="font-heading text-7xl">Get in Touch With<br />Southern Plains.</h1>

        <!-- We must clear the float after the image and text blocks are done -->
        <div class="clear-both"></div>
    </div>

</div>
<!-- Any content outside this div will respect the original layout padding -->
@endsection
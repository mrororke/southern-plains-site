@extends('layouts.blog-base')

@section('page_content')
<!-- 1. AGGRESSIVE FULL-WIDTH CONTAINER (mx-auto negation) -->
<div class="
    mx-[-1rem] lg:ml-[-105px] lg:mr-[-95px] /* Negates Padding */
    w-screen ml-[calc(50%-50vw)]              /* Negates max-width and centering */
    pt-10 pb-10 bg-gray-100
">
    <!-- 2. ALIGNMENT WRAPPER: Re-applies the original site padding for the content. -->
    <div class="lg:pl-[105px] lg:pr-[95px] p-4 clearfix">

        <!-- Image: Floated right, added spacing and width constraint. -->
        <img src="{{ asset('images/error-hamish.png') }}"
            alt="Hamish"
            class="float-right ml-8 max-w-xs">

        <!-- Headlines: These are now aligned correctly due to the inner padding -->
        <h4 class="uppercase text-xs font-bold">Ask Us Anything</h4>
        <h1 class="font-heading text-7xl">Get in Touch With<br />Southern Plains.</h1>

        <div class="clear-both"></div>
    </div>

</div>
@endsection
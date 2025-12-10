@extends('layouts.blog-base')

@section('page_content')
<!-- 1. FULL VIEWPORT WIDTH CONTAINER (Forcing the background color to the edges) -->
<div class="
    w-screen ml-[calc(50%-50vw)]              /* Aggressively negates max-width and centers the element on the viewport */
    pt-10 pb-10 bg-gray-100
">

    <!-- 2. ALIGNMENT WRAPPER: This re-applies the original site padding ONLY to the left side
        of the content block, and uses overflow-hidden to contain the float. -->
    <div class="
        lg:pl-[105px] p-4 pl-4                  /* Re-applies the correct left-padding */
        mx-auto max-w-7xl relative overflow-hidden /* Ensures content alignment & float containment */
    ">
        
        <!-- Image: 
            - Floated right.
            - Uses negative margins to break out of the padding on the right side and hit the edge.
            - mr-[-1rem] negates the p-4 right padding on small screens.
            - lg:mr-[-95px] negates the custom right padding on large screens. -->
        <img src="{{ asset('images/error-hamish.png') }}"
            alt="Hamish"
            class="float-right ml-8 mr-[-1rem] lg:mr-[-95px] max-w-xs">

        <!-- Headlines: These are now aligned correctly with the rest of your site -->
        <h4 class="uppercase text-xs font-bold">Ask Us Anything</h4>
        <h1 class="font-heading text-7xl">Get in Touch With<br />Southern Plains.</h1>

    </div>
</div>
@endsection
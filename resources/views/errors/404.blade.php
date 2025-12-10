@extends('layouts.blog-base')

@section('page_content')
<style>
    /* This CSS class is necessary to break out of any max-width or mx-auto centering 
    applied in your layouts/blog-base.blade.php that Tailwind utilities cannot override.
    It forces the element to 100% of the viewport width and centers it using transform. 
    */
    .full-breakout {
        width: 100vw;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }
</style>

<!-- 1. GUARANTEED FULL-WIDTH CONTAINER: 
     - Uses the raw 'full-breakout' class to hit the viewport edges.
     - We keep the correct negative margins (mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px])
       to counteract the parent's padding, allowing the inner content to be correctly positioned.
     - Includes the background color and vertical padding.
     - Includes overflow-hidden to contain the float. -->
<div class="
    full-breakout 
    mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px] 
    pt-10 pb-10 bg-gray-100 
    relative overflow-hidden
">
    
    <!-- 2. ALIGNMENT WRAPPER: 
         - Re-applies the necessary padding to keep the text aligned with the rest of the site.
         - Uses a reasonable max-width to ensure the text doesn't span the entire viewport (100vw). -->
    <div class="lg:pl-[120px] p-4 pl-4 mx-auto max-w-5xl">

        <!-- Image: 
            - Floats right.
            - ml-8 for text spacing.
            - mr-[-1rem] negates the p-4 right padding on small screens.
            - lg:mr-[-120px] negates the custom 120px padding on large screens, forcing it to the display edge. -->
        <img src="{{ asset('images/error-hamish.png') }}"
            alt="Hamish"
            class="float-right ml-8 mr-[-1rem] lg:mr-[-120px] max-w-xs">

        <!-- Headlines: Display Hamish's thought bubble -->
        <h4 class="uppercase text-xs font-bold">404 ERROR</h4>
        <h1 class="font-heading text-7xl">I looked, but I<br />can't find it!</h1>
        
        <!-- 3. CLEARFIX: Contains the float to protect the footer layout. -->
        <div class="clear-both"></div>
    </div>
</div>
@endsection
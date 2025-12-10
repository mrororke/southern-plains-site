@extends('layouts.blog-base')

@section('page_content')
<style>
    /* GUARANTEES full viewport width (100vw), overriding all parent constraints */
    .full-breakout {
        width: 100vw;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }
</style>

<!-- 1. AGGRESSIVE FULL-WIDTH CONTAINER: Background/Image Edge Alignment -->
<div class="
    full-breakout 
    mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px] 
    pt-10 pb-10 bg-gray-100 
    relative overflow-hidden
">
    
    <!-- 2. ALIGNMENT WRAPPER: Re-applies the site's original left padding rules. 
         This wrapper provides the margin the text needs to align with the rest of your site. -->
    <div class="lg:pl-[120px] p-4 pl-4">
        
        <!-- Image: Floats right and breaks out to the edge of the display -->
        <img src="{{ asset('images/error-hamish.png') }}"
            alt="Hamish"
            class="float-right ml-8 mr-[-1rem] lg:mr-[-120px] max-w-xs">

        <!-- Headlines: These should now align correctly, using the padding from the parent div -->
        <h4 class="uppercase text-xs font-bold">404 ERROR</h4>
        <h1 class="font-heading text-7xl">I looked, but I<br />can't find it!</h1>
        
        <!-- 3. CLEARFIX: Ensures the float is contained and does not break the footer -->
        <div class="clear-both"></div>
    </div>
</div>
@endsection
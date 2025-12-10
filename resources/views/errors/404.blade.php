@extends('layouts.blog-base')

@section('page_content')
<style>
    /* GUARANTEES full viewport width, overriding all parent constraints */
    .full-breakout {
        width: 100vw;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }
</style>

<!-- 1. FULL-WIDTH CONTAINER: Background and image edge alignment is guaranteed by CSS/Negative Margins. -->
<div class="
    full-breakout 
    mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px] 
    pt-10 pb-10 bg-gray-100 
    relative overflow-hidden
">
    
    <!-- 2. ALIGNMENT WRAPPER: Re-applies the site's original left padding. 
         Note: We removed the mx-auto max-w-* wrappers as they caused the misalignment. -->
    <div class="lg:pl-[120px] p-4 pl-4 clearfix">
        
        <!-- Image: Floats right and breaks out to the edge of the display -->
        <img src="{{ asset('images/error-hamish.png') }}"
            alt="Hamish"
            class="float-right ml-8 mr-[-1rem] lg:mr-[-120px] max-w-xs">

        <!-- Headlines: Should now align perfectly with the original content column's left edge -->
        <h4 class="uppercase text-xs font-bold">404 ERROR</h4>
        <h1 class="font-heading text-7xl">I looked, but I<br />can't find it!</h1>
        
        <div class="clear-both"></div>
    </div>
</div>
@endsection
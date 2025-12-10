@extends('layouts.blog-base')

@section('page_content')
<style>
    /* GUARANTEES full viewport width (100vw) for the background */
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
    pt-10 pb-10 bg-gray-100 
    relative overflow-hidden
">
    
    <!-- 2. CONTENT ALIGNMENT WRAPPER: Re-establishes the site's main content column.
         This is the key. We are assuming max-w-7xl and centering. -->
    <div class="mx-auto max-w-7xl">
        
        <!-- 3. INNER PADDING WRAPPER: Applies the site's specific padding (120px/1rem). -->
        <div class="lg:pl-[120px] p-4 clearfix">
            
            <!-- Image: Floats right and uses the EXACT negative margin to hit the edge, 
                 counteracting the parent padding only on the right. -->
            <img src="{{ asset('images/error-hamish.png') }}"
                alt="Hamish"
                class="float-right ml-8 mr-[-1rem] lg:mr-[-120px] max-w-xs">

            <!-- Headlines: Should now align correctly with the rest of your site's content column -->
            <h4 class="uppercase text-xs font-bold">404 ERROR</h4>
            <h1 class="font-heading text-7xl">I looked, but I<br />can't find it!</h1>
            
            <div class="clear-both"></div>
        </div>
    </div>
</div>
@endsection
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

<!-- 1. GUARANTEED FULL-WIDTH CONTAINER (Background/Image Edge) -->
<div class="
    full-breakout 
    mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px] 
    pt-10 pb-10 bg-gray-100 
    relative overflow-hidden
">
    
    <!-- 2. CONTENT ALIGNMENT WRAPPER: Recreates the main site column.
         - max-w-7xl and mx-auto center the content column on the page. 
         - This is where the rest of your site content starts and ends. -->
    <div class="mx-auto max-w-7xl">
        
        <!-- 3. INNER PADDING WRAPPER: Re-applies the specific left padding (120px/1rem) 
             to make the text start exactly where it should. -->
        <div class="lg:pl-[120px] p-4 pl-4 relative clearfix">
            
            <!-- Image: Floats right and breaks out (remains the same) -->
            <img src="{{ asset('images/error-hamish.png') }}"
                alt="Hamish"
                class="float-right ml-8 mr-[-1rem] lg:mr-[-120px] max-w-xs">

            <!-- Headlines: Now aligned to the content column -->
            <h4 class="uppercase text-xs font-bold">404 | File Not Found</h4>
            <h1 class="font-heading text-7xl">I looked, but I<br />can't find it!</h1>
            
            <div class="clear-both"></div>
        </div>
    </div>
</div>
@endsection
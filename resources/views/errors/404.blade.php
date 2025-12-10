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
    
    /* Custom utility to fix the image's right edge for mobile (p-4) */
    .mr-breakout-sm {
        margin-right: -1rem; /* Negates p-4 (1rem) */
    }
</style>

<!-- 1. AGGRESSIVE FULL-WIDTH CONTAINER: Background/Image Edge Alignment -->
<div class="
    full-breakout 
    mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px] 
    pt-10 pb-10 bg-gray-100 
    relative overflow-hidden
">
    
    <!-- 2. GLOBAL CENTERING WRAPPER (REQUIRED): Centers content and provides maximum width.
         Assuming a standard width like max-w-7xl, this is what defines your site's column. -->
    <div class="mx-auto max-w-7xl">
        
        <!-- 3. INNER PADDING WRAPPER: Re-applies the site's specific left padding rules. -->
        <div class="lg:pl-[120px] p-4 clearfix">
            
            <!-- Image: Floats right, breaks out using custom CSS for small screens 
                 and corrected margin for large screens. -->
            <img src="{{ asset('images/error-hamish.png') }}"
                alt="Hamish"
                class="float-right ml-8 mr-breakout-sm lg:mr-[-120px] max-w-xs">

            <!-- Headlines: Should now align correctly, starting 120px from the left of the centered container -->
            <h4 class="uppercase text-xs font-bold">404 ERROR Again</h4>
            <h1 class="font-heading text-7xl">I looked, but I<br />can't find it!</h1>
            
            <div class="clear-both"></div>
        </div>
    </div>
</div>
@endsection
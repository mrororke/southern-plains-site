@extends('layouts.blog-base')

@section('page_content')

<!-- 1. FULL-WIDTH CONTAINER: Uses ONLY the negative margins to negate the parent padding. -->
<div class="
    mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px] 
    pt-10 pb-10 bg-gray-100 
    relative overflow-hidden
">
    
    <!-- 2. ALIGNMENT WRAPPER: This wrapper's *only job* is to re-establish the left and right padding 
         that the rest of your site uses (120px/1rem), thus aligning the text. -->
    <div class="lg:px-[120px] p-4 clearfix">
        
        <!-- Image: Floats right and breaks out to the edge of the display
             - Uses negative margin ONLY on the right side to hit the edge (mr-[-120px])
             - ml-8 provides spacing from the text. -->
        <img src="{{ asset('images/error-hamish.png') }}"
            alt="Hamish"
            class="float-right ml-8 mr-[-1rem] lg:mr-[-120px] max-w-xs">

        <!-- Headlines: Should align perfectly with the original content column's left edge -->
        <h4 class="uppercase text-xs font-bold bg-red-200">404 ERROR Again</h4>
        <h1 class="font-heading text-7xl bg-red-200">I looked, but I<br />can't find it!</h1>
        
        <div class="clear-both"></div>
    </div>
</div>
@endsection
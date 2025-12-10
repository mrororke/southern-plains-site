@extends('layouts.blog-base')

@section('page_content')
<div class="pt-10 pb-10">
    <!-- 1. The Full-Width Container (Busts out of global padding) -->
    <div class="mx-[-1rem] lg:ml-[-105px] lg:mr-[-95px]">
        
        <!-- 2. The Inner Content Wrapper (Applies Padding ONLY to the text) -->
        <div class="lg:pl-[105px] lg:pr-[95px] p-4 clearfix"> 
            
            <!-- We need clearfix here because the image is floated -->
            <img src="{{ asset('images/error-hamish.png') }}"
                alt="Hamish"
                class="float-right ml-8"> <!-- Added ml-8 for spacing -->

            <h4 class="uppercase text-xs font-bold">Ask Us Anything</h4>
            <h1 class="font-heading text-7xl">Get in Touch With<br />Southern Plains.</h1>
        </div>
        
    </div>
</div>
@endsection
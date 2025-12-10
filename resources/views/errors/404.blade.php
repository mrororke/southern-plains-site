@extends('layouts.blog-base')

@section('page_content')
<style>
    /* GUARANTEES full viewport width (100vw) */
    .full-breakout {
        width: 100vw;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }
</style>

<!-- FULL-WIDTH CONTAINER: Guarantees 100vw background -->
<div class="
    full-breakout 
    pt-10 pb-10 
    bg-no-repeat 
    relative overflow-hidden
" 
    style="
        background-image: url('{{ asset('images/error-hamish.png') }}');
        background-position: 100% 100%; /* Bottom-Right Corner */
        background-size: auto; /* Natural Image Size */
        background-color: #F3F4F6; /* Gray background */
        /* Temporary fix for padding negation, which may be conflicting */
        margin-left: -1rem;
        margin-right: -1rem;
    ">
    
    <!-- ALIGNMENT WRAPPER: This is the problem area. We are testing the correct padding. -->
    <div class="lg:pl-[120px] p-4">
        
        <!-- Headlines: Check alignment here -->
        <h4 class="uppercase text-xs font-bold">404 ERROR</h4>
        <h1 class="font-heading text-7xl">I looked, but I<br />can't find it!</h1>
        
        <!-- Vertical space -->
        <div class="h-64 sm:h-80 md:h-96"></div>
    </div>
</div>
@endsection
@extends('layouts.blog-base')

@section('page_content')
<style>
    /* This custom CSS class is for the main row. 
    It forces the background to span the full width of the main content column 
    (negating parent padding only). 
    */
    .header-section {
        /* Negates the p-4 padding */
        margin-left: -1rem;
        margin-right: -1rem;
        /* Negates the lg:px-[120px] padding */
        @media (min-width: 1024px) {
            margin-left: -120px;
            margin-right: -120px;
        }
    }
</style>

<!-- 1. HEADER SECTION: Now uses the simpler negative margin class for the full background color. -->
<div class="header-section pt-10 pb-10 bg-gray-100 relative overflow-hidden">
    
    <!-- 2. CONTENT WRAPPER: Re-applies the necessary padding ONLY for the text to align. -->
    <div class="lg:pl-[120px] p-4">

        <!-- Headlines: PERFECTLY ALIGNED because they are correctly nested. -->
        <h4 class="uppercase text-xs font-bold">404 ERROR Again</h4>
        <h1 class="font-heading text-7xl">I looked, but I<br />can't find it!</h1>
        
        <!-- Placeholder for the Hamish image content -->
        <div class="h-64 sm:h-80 md:h-96"></div>

    </div>

    <!-- 3. ABSOLUTELY POSITIONED IMAGE: Placed at the bottom-right corner of the section.
         - The negative 'right-0' combined with the negative margins on the parent ensures it hits the edge. -->
    <img src="{{ asset('images/error-hamish.png') }}"
        alt="Hamish"
        class="absolute bottom-0 right-0 max-w-xs transform translate-y-1/4" 
        style="
            /* Override for large screen: pull 120px to the right to hit the edge */
            @media (min-width: 1024px) {
                right: -120px;
            }
            /* Override for small screen: pull 1rem to the right to hit the edge */
            right: -1rem;
        ">
</div>
@endsection
@extends('layouts.blog-base')

@section('page_content')
<style>
    /* This custom CSS class is the ultimate solution to force the width to 100vw, 
       overriding any hidden 'max-width' or 'mx-auto' on a parent element. */
    .full-breakout {
        width: 100vw;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }
</style>

<!-- 1. AGGRESSIVE FULL-WIDTH CONTAINER: 
     - Guarantees 100vw width via .full-breakout
     - Correctly negates the parent padding (1rem/120px).
     - bg-no-repeat bg-bottom-right: Ensures Hamish is at natural size and positioned correctly. -->
<div class="
    full-breakout 
    mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px] 
    pt-10 pb-10 
    bg-no-repeat bg-bottom-right 
    relative overflow-hidden
" 
    style="background-image: url('{{ asset('images/error-hamish.png') }}');">
    
    <!-- 2. ALIGNMENT WRAPPER: Re-applies the site's original left padding rules to align the text. 
         This ensures the text is correctly indented by 120px/1rem. -->
    <div class="lg:pl-[120px] p-4">
        
        <!-- Headlines: These should now be aligned with the rest of your site's content. -->
        <h4 class="uppercase text-xs font-bold">404 ERROR</h4>
        <h1 class="font-heading text-7xl">I looked, but I<br />can't find it!</h1>
        
        <!-- Add vertical space to prevent text from overlapping Hamish's image area. -->
        <div class="h-64 sm:h-80 md:h-96"></div>
    </div>
</div>
@endsection
@extends('layouts.blog-base')

@section('page_content')

<!-- 1. FULL-WIDTH CONTAINER: Now acts as the background image container.
     - mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px]: Correctly negates the parent's padding, guaranteeing full width.
     - bg-cover bg-bottom-right: Applies Hamish as the background image.
     - style: Inline style is required to set the specific background image URL. -->
<div class="
    mx-[-1rem] lg:ml-[-120px] lg:mr-[-120px] 
    pt-10 pb-10 
    bg-cover bg-bottom-right 
    relative overflow-hidden
" 
    style="background-image: url('{{ asset('images/error-hamish.png') }}');">
    
    <!-- 2. CONTENT WRAPPER: Re-applies the site's original left padding rules to align the text. -->
    <div class="lg:pl-[120px] p-4">
        
        <!-- Headlines: These are perfectly aligned with your site's content column. -->
        <h4 class="uppercase text-xs font-bold">404 ERROR Test</h4>
        <h1 class="font-heading text-7xl">I looked, but I<br />can't find it!</h1>
        
        <!-- Add some vertical space here so the text sits higher than Hamish's head (if needed). -->
        <div class="h-64 sm:h-80 md:h-96"></div>
    </div>
</div>
@endsection
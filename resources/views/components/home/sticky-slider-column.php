@props(['slides']) 

<div class="hidden lg:block lg:sticky lg:top-0 h-screen w-full lg:w-1/3 -z-10" style="margin-top:-115px">
    <div id="header-carousel" class="relative w-full h-full" data-carousel="slide">
        <div class="relative overflow-hidden h-screen">
            
            @foreach ($slides as $slide)
                <x-shared.carousel-slide :image-path="$slide['path']" :alt-text="$slide['alt']" />
            @endforeach
            
        </div>
    </div>
</div>
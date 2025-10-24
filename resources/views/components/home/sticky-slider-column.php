@props(['slides']) 

{{-- ABSOLUTELY NO CLASS CHANGES HERE --}}
<div class="hidden lg:block lg:sticky lg:top-0 h-screen w-full lg:w-1/3 -z-10" style="margin-top:-115px">
    <div id="header-carousel" class="relative w-full h-full" data-carousel="slide">
        <div class="relative overflow-hidden h-screen">
            @foreach ($slides as $slide)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset($slide['path']) }}" class="absolute block w-full" alt="{{ $slide['alt'] ?? 'Slider Image' }}">
                </div>
            @endforeach
        </div>
    </div>
</div>
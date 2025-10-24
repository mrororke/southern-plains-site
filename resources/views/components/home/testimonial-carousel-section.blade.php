@props(['testimonials'])

<div class="lg:px-[120px] p-6">
    <h3 class="font-heading text-5xl mb-6">Hear it From Our Handlers</h3>
    <p class="text-base mb-2">Nothing proves the strength of our system like the success stories of the dogs and handlers we work with. See what our community has to say about training, competing, and growing with Southern Plains.</p>

    <div id="testimonials-carousel" class="relative w-full" data-carousel="slide">

        <div class="relative h-96 overflow-hidden mt-4 mb-4">

            @foreach ($testimonials as $index => $testimonial)
            <x-shared.testimonial-card
                :quote="$testimonial['quote']"
                :attribution="$testimonial['attribution']"
                :active="$index === 0" {{-- Set the first slide as active --}} />
            @endforeach

        </div>

        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
            @foreach ($testimonials as $index => $testimonial)
            <button
                type="button"
                class="w-3 h-3 rounded-full"
                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $index + 1 }}"
                data-carousel-slide-to="{{ $index }}">
            </button>
            @endforeach
        </div>
    </div>
</div>
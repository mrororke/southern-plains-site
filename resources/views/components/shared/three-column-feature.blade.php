@props(['features'])

<div class="lg:px-[120px] p-6">
    <h3 class="font-heading text-5xl mb-6">Our guiding principles</h3>
    <p class="text-base mb-2">Our business is founded on a commitment to methods that are both humane and scientifically sound, ensuring success while always honoring the dog-handler partnership.</p>
    
    {{-- This is the key change: adjusting the grid-cols to 3 columns on medium screens and up --}}
    <div class="grid md:grid-cols-3 lg:grid-cols-3 gap-8 text-center">

        @foreach ($features as $feature)
        <x-shared.feature-card-small
            :svg="$feature['svg']"
            :title="$feature['title']"
            :content="$feature['content']" />
        @endforeach

    </div>
</div>
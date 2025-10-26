@props(['features'])

<div class="lg:px-[120px] p-6">
    <h3 class="font-heading text-5xl mb-6">Why Choose Southern Plains?</h3>
    
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
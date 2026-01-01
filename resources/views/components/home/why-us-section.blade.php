@props(['features'])

<div class="lg:px-[120px] p-6">
    <h3 class="font-heading text-5xl mb-6">Why Choose Southern Plains?</h3>
    <div class="grid md:grid-cols-2 gap-4 text-center">

        @foreach ($features as $feature)
        <x-shared.feature-card
            :svg="$feature['svg']"
            :title="$feature['title']"
            :content="$feature['content']" />
        @endforeach

    </div>
</div>
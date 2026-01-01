@props(['paths'])

<div class="mt-6">
    <h3 class="font-heading text-5xl mt-2 mb-6">Choose Your Path</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach ($paths as $path)
        <x-shared.path-choice-card
            :href="$path['href']"
            :image-path="$path['image']"
            :title="$path['title']" />
        @endforeach

    </div>
</div>
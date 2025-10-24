@props(['imagePath', 'altText'])

<div class="hidden duration-700 ease-in-out" data-carousel-item>
    <img src="{{ asset($imagePath) }}" class="absolute block w-full" alt="{{ $altText }}">
</div>
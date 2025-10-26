@props(['svg', 'title', 'content'])

<div class="p-8 border">
    {{-- Display the SVG markup directly (Unescaped output) --}}
    {!! $svg !!}

    <h3 class="uppercase text-small font-bold mb-4">{{ $title }}</h3>
    <p class="text-xs mb-2">{{ $content }}</p>
</div>
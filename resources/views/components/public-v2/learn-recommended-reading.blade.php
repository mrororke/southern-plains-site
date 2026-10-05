@props([
    'title',
    'description',
    'href',
])

{{-- Recommended Reading --}}
<x-public-v2.learn-recommended-reading
    title="What Is NASDA, Anyway?"
    description="Want the quick version? Our NASDA guide covers the games, training, trials, and everything you need to know to get started."
    href="{{ route('public-v2.learn.guide') }}">
    Read the Guide
</x-public-v2.learn-recommended-reading>
{{-- End Recommended Reading --}}
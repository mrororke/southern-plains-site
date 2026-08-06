@props([
    'title',
    'description' => null,
])

<header {{ $attributes->class('mb-6') }}>
    <h1 class="font-sans text-6xl font-semibold text-sp-charcoal">
        {{ $title }}
    </h1>

    @if($description)
        <p class="mt-2 max-w-3xl text-sm text-sp-slate">
            {{ $description }}
        </p>
    @endif
</header>
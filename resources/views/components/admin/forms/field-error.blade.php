@props([
    'name',
])

@error($name)
    <p
        {{ $attributes->class(
            'mt-1 text-sm text-sp-burntClay'
        ) }}
    >
        {{ $message }}
    </p>
@enderror
@props([
    'tags' => [],
])

{{-- Learn Tags --}}
<div class="flex flex-wrap items-center gap-2">

    <span class="text-xs uppercase text-sp-slate mr-2">
        Tags
    </span>

    @foreach ($tags as $tag)

        <span class="inline-flex items-center rounded-full bg-sp-limestone px-4 py-2 text-xs text-sp-prairieGreen">
            {{ $tag }}
        </span>

    @endforeach

</div>
{{-- End Learn Tags --}}
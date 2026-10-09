@props([
    'tags' => [],
])

{{-- Learn Tags --}}
<div class="flex flex-wrap items-center gap-2">

    <span class="text-xs uppercase text-sp-slate mr-2">
        Tags
    </span>

    @foreach ($tags as $tag)

        <a
            href="{{ route('public-v2.learn.index', ['tag' => $tag['slug']]) }}"
            class="inline-flex items-center rounded-full bg-sp-limestone px-4 py-2 text-xs text-sp-prairieGreen transition-colors hover:bg-sp-prairieGreen hover:text-sp-warmIvory focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sp-prairieGreen">

            {{ $tag['name'] }}

        </a>

    @endforeach

</div>
{{-- End Learn Tags --}}
@props(['tricks'])
<table class="w-full text-sp-slate border border-sp-warmStone mb-6
                    [&_tbody_tr:nth-child(odd)>td]:bg-sp-limestone
                    [&_tbody_tr:nth-child(even)>td]:bg-sp-warmIvory
                    [&_tbody_tr:hover>td]:!bg-sp-warmStone/20">



    <thead>
        <tr class="bg-sp-charcoal border-b border-sp-warmStone">
            <th class="p-3 text-left text-sp-warmIvory text-base uppercase" width="65%">Name</th>
            <th class="p-3 text-left text-sp-warmIvory text-base uppercase" width="5%">Videos</th>
            <th class="p-3 text-sp-warmIvory text-base uppercase">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tricks as $trick)
        <tr class="text-sm">
            <td class="p-3 text-sp-charcoal">
                {{ $trick->name }}<br>
                <span class="text-xs italic text-sp-slate">
                    {{ $trick->levels
        ->pluck('name')
        ->map(fn($l) => ucwords(str_replace('_', ' ', $l)))
        ->join(', ') }}
                </span>
            </td>
            <td class="p-3 text-center text-sp-charcoal">
                {{ $trick->videos->count() }}
            </td>
            <td class="p-3 text-center">
                <a href="#"
                    class="inline-flex items-center justify-center rounded-md
                                    bg-sp-prairieGreen px-4 py-2 text-sm font-medium text-sp-warmIvory
                                    transition-colors duration-200 hover:bg-sp-prairieOchre">
                    Edit
                </a>

                <button type="button"
                    @click="selectBehavior({
                                id: {{ $trick->id }},
                                name: @js($trick->name),
                                notes: @js($trick->notes ?? ''),
                                levels: @js(
                                $trick->levels
                                    ->pluck('name')
                                    ->map(fn($l) => ucwords(str_replace('_', ' ', $l)))
                                    ->values()
                                ),
                                    videos: @js(
                                        $trick->videos ?? []
                                        )
                                    })"
                    class="inline-flex items-center justify-center rounded-md
                                border border-sp-limestone bg-sp-warmIvory px-4 py-2
                                text-sm font-medium text-sp-prairieGreen
                                transition-colors duration-200 hover:bg-sp-prairieOchre hover:text-sp-warmIvory"
                    data-id="">
                    View
                </button>
            </td>
        </tr>
        @endforeach


    </tbody>
</table>
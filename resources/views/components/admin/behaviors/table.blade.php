<table class="w-full text-sp-deepGranite border border-sp-darkGranite mb-6
                    [&_tbody_tr:nth-child(odd)>td]:bg-sp-alloyGray
                    [&_tbody_tr:nth-child(even)>td]:bg-sp-softWhite
                    [&_tbody_tr:hover>td]:!bg-sp-controlledLime/20">



                <thead>
                    <tr class="bg-sp-deepGranite border-b border-sp-darkGranite">
                        <th class="p-3 text-left text-sp-softWhite text-base uppercase" width="65%">Name</th>
                        <th class="p-3 text-left text-sp-softWhite text-base uppercase" width="5%">Videos</th>
                        <th class="p-3 text-sp-softWhite text-base uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tricks as $trick)
                    <tr class="text-sm">
                        <td class="p-3">
                            {{ $trick->name }}<br>
                            <span class="text-xs italic">
                                {{ $trick->levels
        ->pluck('name')
        ->map(fn($l) => ucwords(str_replace('_', ' ', $l)))
        ->join(', ') }}
                            </span>
                        </td>
                        <td class="p-3 text-center">
                            {{ $trick->videos->count() }}
                        </td>
                        <td class="p-3 text-center">
                            <a href="#"
                                class="inline-flex items-center justify-center rounded-md
                                    bg-sp-deepGranite px-4 py-2 text-sm font-medium text-sp-softWhite
                                    transition-colors duration-200 hover:bg-sp-darkGranite">
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
                                border border-sp-alloyGray bg-white px-4 py-2
                                text-sm font-medium text-sp-darkGranite
                                transition-colors duration-200 hover:bg-sp-softWhite"
                                data-id="">
                                View
                            </button>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
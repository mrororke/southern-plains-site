@props(['tricks'])

<table
    class="w-full border border-sp-warmStone
           text-sp-slate mb-6
           [&_tbody_tr:nth-child(odd)>td]:bg-white
           [&_tbody_tr:nth-child(even)>td]:bg-sp-warmIvory
           [&_tbody_tr:hover>td]:!bg-sp-warmStone/20"
>
    <thead>
        <tr class="border-b border-sp-warmStone bg-sp-charcoal">

            <th
                class="p-3 text-left text-base uppercase
                       text-sp-warmIvory"
                width="65%"
            >
                Name
            </th>

            <th
                class="p-3 text-left text-base uppercase
                       text-sp-warmIvory"
                width="5%"
            >
                Videos
            </th>

            <th
                class="p-3 text-base uppercase text-sp-warmIvory"
            >
                Actions
            </th>

        </tr>
    </thead>

    <tbody>

        @foreach($tricks as $trick)

            @php
                /*
                |--------------------------------------------------------------------------
                | Related Resources
                |--------------------------------------------------------------------------
                |
                | Only active Resources are exposed in the Behavior detail card.
                | They are ordered by first sent, newest first.
                |
                */

                $relatedResources = $trick
                    ->resources
                    ->filter(
                        fn ($resource) =>
                            $resource->status === 'active'
                    )
                    ->sortByDesc(
                        fn ($resource) =>
                            $resource->first_sent?->timestamp
                            ?? $resource->created_at->timestamp
                    )
                    ->values();
            @endphp

            <tr class="text-sm">

                <td class="p-3 text-sp-charcoal">

                    {{ $trick->name }}

                    <br>

                    <span class="text-xs italic text-sp-slate">
                        {{ $trick->levels
                            ->pluck('name')
                            ->map(
                                fn ($level) =>
                                    ucwords(
                                        str_replace(
                                            '_',
                                            ' ',
                                            $level
                                        )
                                    )
                            )
                            ->join(', ') }}
                    </span>

                </td>

                <td class="p-3 text-center text-sp-charcoal">
                    {{ $trick->videos->count() }}
                </td>

                <td class="p-3 text-center">

                    <a
                        href="{{ route(
                            'admin.behavior-catalog.edit',
                            $trick
                        ) }}"
                        class="inline-flex items-center justify-center
                               rounded-md bg-sp-prairieGreen
                               px-4 py-2 text-sm font-medium
                               text-sp-warmIvory
                               transition-colors duration-200
                               hover:bg-sp-prairieOchre"
                    >
                        Edit
                    </a>

                    <button
                        type="button"
                        @click="selectBehavior({
                            id: {{ $trick->id }},

                            name: @js(
                                $trick->name
                            ),

                            notes: @js(
                                $trick->notes ?? ''
                            ),

                            levels: @js(
                                $trick->levels
                                    ->pluck('name')
                                    ->map(
                                        fn ($level) =>
                                            ucwords(
                                                str_replace(
                                                    '_',
                                                    ' ',
                                                    $level
                                                )
                                            )
                                    )
                                    ->values()
                            ),

                            videos: @js(
                                $trick->videos ?? []
                            ),

                            resources: @js(
                                $relatedResources
                                    ->map(
                                        fn ($resource) => [
                                            'id' =>
                                                $resource->id,

                                            'title' =>
                                                $resource->title,

                                            'series' =>
                                                $resource
                                                    ->series
                                                    ?->name,

                                            'year' =>
                                                $resource->year,

                                            'session' =>
                                                $resource->session,

                                            'week_number' =>
                                                $resource
                                                    ->week_number,

                                            'type' =>
                                                $resource
                                                    ->type
                                                    ?->name,

                                            'first_sent' =>
                                                $resource
                                                    ->first_sent
                                                        ?->format(
                                                            'M j, Y'
                                                        ),

                                            'url' =>
                                                route(
                                                    'admin.resource-library.show',
                                                    $resource
                                                ),
                                        ]
                                    )
                                    ->values()
                            )
                        })"
                        data-behavior-id="{{ $trick->id }}"
                        class="inline-flex items-center justify-center
                               rounded-md border border-sp-limestone
                               bg-sp-warmIvory px-4 py-2
                               text-sm font-medium
                               text-sp-prairieGreen
                               transition-colors duration-200
                               hover:bg-sp-prairieOchre
                               hover:text-sp-warmIvory"
                    >
                        View
                    </button>

                </td>

            </tr>

        @endforeach

    </tbody>
</table>
@props([
    'selectedBehavior' => 'selectedBehavior',
    'copySimpleAction' => 'copySimple()',
    'copyGroupedAction' => 'copyGrouped()',
])

<div id="behavior-display" class="rounded-md bg-sp-limestone border border-sp-warmStone ml-4 mr-4 p-4">

                {{-- Empty state --}}
                <template x-if="!selectedBehavior">
                    <div class="text-sp-charcoal">
                        <h2 class="font-sans text-sp-charcoal text-4xl mb-4">Behavior</h2>
                        <p class="text-sm text-sp-slate">
                            Select a behavior from the list to view its notes and videos.
                        </p>
                    </div>
                </template>

                {{-- Selected behavior --}}
                <template x-if="selectedBehavior">
                    <div>
                        <div class="flex justify-end items-center">
                            <button
                                    type="button"
                                    @click="selectedBehavior = null"
                                    class="inline-flex items-center justify-center rounded-md
                                        bg-sp-prairieGreen px-2 py-1 text-xs font-bold text-sp-warmIvory
                                        transition-colors duration-200 hover:brightness-95">
                                    X
                                </button>
                        </div>
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="font-sans text-sp-charcoal text-4xl" x-text="selectedBehavior.name"></h2>
                        </div>
                        <div class="flex justify-start items-center mb-6 border-b border-sp-warmStone pb-4">
                            <div class="flex gap-2">
                                <button
                                    type="button"
                                    @click="copySimple()"
                                    class="inline-flex items-center justify-center rounded-md
                                        bg-sp-prairieGreen px-2 py-1 text-xs font-bold text-sp-warmIvory
                                        transition-colors duration-200 hover:brightness-95">
                                    Copy Simple
                                </button>

                                <button
                                    type="button"
                                    @click="copyGrouped()"
                                    class="inline-flex items-center justify-center rounded-md
                                        bg-sp-prairieGreen px-2 py-1 text-xs font-bold text-sp-warmIvory
                                        transition-colors duration-200 hover:brightness-95">
                                    Copy Grouped
                                </button>
                                
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-sans text-sp-charcoal text-3xl">Categories</h3>

                            <template x-if="selectedBehavior.levels && selectedBehavior.levels.length">
                                <p class="text-sm italic text-sp-slate" x-text="selectedBehavior.levels.join(', ')"></p>
                            </template>

                            <template x-if="!selectedBehavior.levels || !selectedBehavior.levels.length">
                                <p class="text-sm italic text-sp-slate">No category assigned.</p>
                            </template>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-sans text-sp-charcoal text-3xl">Notes</h3>

                            <template x-if="selectedBehavior.notes">
                                <p class="whitespace-pre-line text-sm" x-html="selectedBehavior.notes"></p>
                            </template>

                            <template x-if="!selectedBehavior.notes">
                                <p class="text-sm italic">No notes entered.</p>
                            </template>
                        </div>

                        <div>
                            <h3 class="font-sans text-sp-charcoal text-3xl">Videos</h3>


                            <template x-if="selectedBehavior.videos && selectedBehavior.videos.length">
                                <div class="space-y-2">
                                    <template
                                        x-for="video in selectedBehavior.videos.slice().sort((a, b) => 
                ([1, '1', true, 'true'].includes(b.is_preferred) ? 1 : 0) - 
                ([1, '1', true, 'true'].includes(a.is_preferred) ? 1 : 0)
            )"
                                        :key="video.id">
                                        <div
                                            class="rounded p-3 text-sm"
                                            :class="[1, '1', true, 'true'].includes(video.is_preferred) ? 'bg-sp-warmIvory border border-sp-warmStone' : 'bg-sp-limestone border border-sp-warmStone'">
                                            <div class="font-semibold" x-text="video.creator ?? 'Untitled Video'"></div>

                                            <template x-if="video.url">
                                                <a
                                                    :href="video.url"
                                                    target="_blank"
                                                    class="text-sp-charcoal underline"
                                                    x-text="video.url"></a>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </template>

                            <template x-if="!selectedBehavior.videos || !selectedBehavior.videos.length">
                                <p class="text-sm text-sp-slate italic">No videos added.</p>
                            </template>


                        </div>
                    </div>
                </template>

            </div>
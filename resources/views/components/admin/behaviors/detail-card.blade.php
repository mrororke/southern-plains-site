<div id="behavior-display" class="rounded-md bg-sp-alloyGray ml-4 mr-4 p-4">

                    {{-- Empty state --}}
                    <template x-if="!selectedBehavior">
                        <div class="text-sp-deepGranite">
                            <h2 class="font-heading text-4xl mb-4">Behavior</h2>
                            <p class="text-sm">
                                Select a behavior from the list to view its notes and videos.
                            </p>
                        </div>
                    </template>

                    {{-- Selected behavior --}}
                    <template x-if="selectedBehavior">
                        <div>
                            <div class="flex justify-between items-center mb-6 border-b border-sp-softWhite/.2 pb-4">
                                <h2 class="font-heading text-4xl" x-text="selectedBehavior.name"></h2>

                                <div class="flex gap-2">
                                    <button
                                        type="button"
                                        @click="copySimple()"
                                        class="inline-flex items-center justify-center rounded-md
                            bg-sp-deepGranite px-4 py-2 text-xs uppercase font-medium text-sp-softWhite
                            transition-colors duration-200 hover:bg-sp-darkGranite">
                                        Copy Simple
                                    </button>

                                    <button
                                        type="button"
                                        @click="copyGrouped()"
                                        class="inline-flex items-center justify-center rounded-md
                            border border-sp-alloyGray bg-white px-4 py-2
                            text-xs uppercase font-medium text-sp-darkGranite
                            transition-colors duration-200 hover:bg-sp-softWhite">
                                        Copy Grouped
                                    </button>
                                </div>
                            </div>

                            <div class="mb-6">
                                <h3 class="font-heading text-3xl">Categories</h3>

                                <template x-if="selectedBehavior.levels && selectedBehavior.levels.length">
                                    <p class="text-sm italic" x-text="selectedBehavior.levels.join(', ')"></p>
                                </template>

                                <template x-if="!selectedBehavior.levels || !selectedBehavior.levels.length">
                                    <p class="text-sm italic">No category assigned.</p>
                                </template>
                            </div>

                            <div class="mb-6">
                                <h3 class="font-heading text-3xl">Notes</h3>

                                <template x-if="selectedBehavior.notes">
                                    <p class="whitespace-pre-line text-sm" x-html="selectedBehavior.notes"></p>
                                </template>

                                <template x-if="!selectedBehavior.notes">
                                    <p class="text-sm italic">No notes entered.</p>
                                </template>
                            </div>

                            <div>
                                <h3 class="font-heading text-3xl">Videos</h3>
                                

                                <template x-if="selectedBehavior.videos && selectedBehavior.videos.length">
    <div class="space-y-2">
        <template
            x-for="video in selectedBehavior.videos.slice().sort((a, b) => 
                ([1, '1', true, 'true'].includes(b.is_preferred) ? 1 : 0) - 
                ([1, '1', true, 'true'].includes(a.is_preferred) ? 1 : 0)
            )"
            :key="video.id"
        >
            <div
                class="rounded p-3 text-sm"
                :class="[1, '1', true, 'true'].includes(video.is_preferred) ? 'bg-sp-controlledLime' : 'bg-sp-softWhite'"
            >
                <div class="font-semibold" x-text="video.creator ?? 'Untitled Video'"></div>

                <template x-if="video.url">
                    <a
                        :href="video.url"
                        target="_blank"
                        class="text-sp-deepGranite underline"
                        x-text="video.url"
                    ></a>
                </template>
            </div>
        </template>
    </div>
</template>

<template x-if="!selectedBehavior.videos || !selectedBehavior.videos.length">
    <p class="text-sm italic">No videos added.</p>
</template>


                            </div>
                        </div>
                    </template>

                </div>
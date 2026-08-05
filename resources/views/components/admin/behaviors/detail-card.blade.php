@props([
    'selectedBehavior' => 'selectedBehavior',
    'copySimpleAction' => 'copySimple()',
    'copyGroupedAction' => 'copyGrouped()',
    'copyPreferredAction' => 'copyPreferred()',
])

<div
    id="behavior-display"
    class="mx-4 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6"
>
    {{-- Empty state --}}
    <template x-if="! selectedBehavior">
        <div class="text-sp-charcoal">
            <h2 class="mb-2 font-sans text-2xl font-semibold">
                Behavior
            </h2>

            <p class="text-sm text-sp-slate">
                Select a behavior from the list to view its notes and videos.
            </p>
        </div>
    </template>

    {{-- Selected behavior --}}
    <template x-if="selectedBehavior">
        <div>
            {{-- Header --}}
            <div class="mb-6 flex items-start justify-between gap-4">
                <h2
                    class="font-sans text-3xl font-semibold leading-tight text-sp-charcoal"
                    x-text="selectedBehavior.name"
                ></h2>

                <button
                    type="button"
                    @click="clearBehavior()"
                    aria-label="Close behavior details"
                    class="inline-flex shrink-0 items-center justify-center
                           rounded-md border border-sp-warmStone bg-transparent
                           p-2 text-sp-charcoal transition-colors
                           hover:bg-sp-limestone"
                >
                    <x-icons.x class="h-4 w-4" />
                </button>
            </div>

            {{-- Copy actions --}}
            <div class="mb-6 flex flex-wrap gap-2">
                <button
                    type="button"
                    @click="{{ $copySimpleAction }}"
                    class="inline-flex items-center justify-center gap-2 rounded-md
                           bg-sp-prairieOchre px-3 py-2 text-sm font-semibold
                           text-sp-warmIvory transition-colors
                           hover:brightness-95"
                >
                    <x-icons.copy class="h-3.5 w-3.5" />
                    Copy Simple
                </button>

                <button
                    type="button"
                    @click="{{ $copyGroupedAction }}"
                    class="inline-flex items-center justify-center gap-2 rounded-md
                           bg-sp-goldenrod px-3 py-2 text-sm font-semibold
                           text-sp-warmIvory transition-colors
                           hover:brightness-95"
                >
                    <x-icons.copy class="h-3.5 w-3.5" />
                    Copy Grouped
                </button>

                <template x-if="preferredVideo()">
                    <button
                        type="button"
                        @click="{{ $copyPreferredAction }}"
                        class="inline-flex items-center justify-center gap-2 rounded-md
                               bg-sp-burntClay px-3 py-2 text-sm font-semibold
                               text-sp-warmIvory transition-colors
                               hover:brightness-95"
                    >
                        <x-icons.copy class="h-3.5 w-3.5" />
                        Copy Preferred
                    </button>
                </template>
            </div>

            <div class="border-t border-sp-warmStone pt-6">

                {{-- Categories --}}
                <section class="mb-8">
                    <h3
                        class="mb-2 text-xs font-semibold uppercase
                               tracking-wide text-sp-slate"
                    >
                        Categories
                    </h3>

                    <template
                        x-if="
                            selectedBehavior.levels
                            && selectedBehavior.levels.length
                        "
                    >
                        <p
                            class="text-sm italic text-sp-slate"
                            x-text="selectedBehavior.levels.join(', ')"
                        ></p>
                    </template>

                    <template
                        x-if="
                            ! selectedBehavior.levels
                            || ! selectedBehavior.levels.length
                        "
                    >
                        <p class="text-sm italic text-sp-slate">
                            No category assigned.
                        </p>
                    </template>
                </section>

                {{-- Notes --}}
                <section class="mb-8">
                    <h3
                        class="mb-2 text-xs font-semibold uppercase
                               tracking-wide text-sp-slate"
                    >
                        Notes
                    </h3>

                    <template x-if="selectedBehavior.notes">
                        <div
                            class="prose prose-sm max-w-none rounded-md
                                   bg-sp-limestone px-4 py-3
                                   prose-headings:text-sp-charcoal
                                   prose-p:text-sp-charcoal
                                   prose-strong:text-sp-charcoal
                                   prose-a:text-sp-prairieGreen
                                   prose-li:text-sp-charcoal"
                            x-html="selectedBehavior.notes"
                        ></div>
                    </template>

                    <template x-if="! selectedBehavior.notes">
                        <div class="rounded-md bg-sp-limestone px-4 py-3">
                            <p class="text-sm italic text-sp-slate">
                                No notes entered.
                            </p>
                        </div>
                    </template>
                </section>

                {{-- Preferred video --}}
                <template x-if="preferredVideo()">
                    <section class="mb-8">
                        <h3
                            class="mb-2 text-xs font-semibold uppercase
                                   tracking-wide text-sp-slate"
                        >
                            Preferred Video
                        </h3>

                        <div
                            class="rounded-md border-l-4 border-sp-goldenrod
                                   bg-[#D8B64C]/15 p-4"
                        >
                            <div class="flex items-start justify-between gap-4">
                                <div class="min-w-0">
                                    <p
                                        class="font-semibold text-sp-charcoal"
                                        x-text="
                                            preferredVideo().creator
                                            ?? 'Untitled Video'
                                        "
                                    ></p>

                                    <p
                                        class="mt-1 text-xs uppercase tracking-wide
                                               text-sp-slate"
                                        x-text="platformLabel(preferredVideo().platform)"
                                    ></p>

                                    <p
                                        class="mt-2 text-xs font-semibold uppercase
                                               tracking-wide text-sp-burntClay"
                                    >
                                        Recommended
                                    </p>
                                </div>

                                <div class="flex shrink-0 gap-2">
                                    <a
                                        :href="preferredVideo().url"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-flex items-center gap-1.5 rounded-md
                                               bg-sp-charcoal px-3 py-2 text-xs
                                               font-semibold text-sp-warmIvory
                                               transition-colors hover:bg-[#9B5C3A]"
                                    >
                                        <x-icons.external-link class="h-3.5 w-3.5" />
                                        Open
                                    </a>

                                    <button
                                        type="button"
                                        @click="copyVideoUrl(preferredVideo().url)"
                                        class="inline-flex items-center gap-1.5 rounded-md
                                               border border-sp-warmStone
                                               bg-sp-warmIvory px-3 py-2 text-xs
                                               font-semibold text-sp-charcoal
                                               transition-colors hover:bg-sp-limestone"
                                    >
                                        <x-icons.copy class="h-3.5 w-3.5" />
                                        Copy Link
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </template>

                {{-- Additional videos --}}
                <section>
                    <h3
                        class="mb-2 text-xs font-semibold uppercase
                               tracking-wide text-sp-slate"
                    >
                        Additional Videos
                    </h3>

                    <template x-if="additionalVideos().length">
                        <div class="space-y-3">
                            <template
                                x-for="video in additionalVideos()"
                                :key="video.id"
                            >
                                <div
                                    class="rounded-md border border-sp-warmStone
                                           bg-sp-limestone p-4"
                                >
                                    <div
                                        class="flex items-start justify-between
                                               gap-4"
                                    >
                                        <div class="min-w-0">
                                            <p
                                                class="font-semibold text-sp-charcoal"
                                                x-text="
                                                    video.creator
                                                    ?? 'Untitled Video'
                                                "
                                            ></p>

                                            <p
                                                class="mt-1 text-xs uppercase
                                                       tracking-wide text-sp-slate"
                                                x-text="platformLabel(video.platform)"
                                            ></p>
                                        </div>

                                        <div class="flex shrink-0 gap-2">
                                            <a
                                                :href="video.url"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="inline-flex items-center
                                                       gap-1.5 rounded-md
                                                       bg-sp-charcoal px-3 py-2
                                                       text-xs font-semibold
                                                       text-sp-warmIvory
                                                       transition-colors
                                                       hover:bg-[#9B5C3A]"
                                            >
                                                <x-icons.external-link
                                                    class="h-3.5 w-3.5"
                                                />
                                                Open
                                            </a>

                                            <button
                                                type="button"
                                                @click="copyVideoUrl(video.url)"
                                                class="inline-flex items-center
                                                       gap-1.5 rounded-md
                                                       border border-sp-warmStone
                                                       bg-sp-warmIvory px-3 py-2
                                                       text-xs font-semibold
                                                       text-sp-charcoal
                                                       transition-colors
                                                       hover:bg-white"
                                            >
                                                <x-icons.copy
                                                    class="h-3.5 w-3.5"
                                                />
                                                Copy Link
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <template
                        x-if="
                            ! selectedBehavior.videos
                            || ! selectedBehavior.videos.length
                        "
                    >
                        <div class="rounded-md bg-sp-limestone px-4 py-3">
                            <p class="text-sm italic text-sp-slate">
                                No videos added.
                            </p>
                        </div>
                    </template>

                    <template
                        x-if="
                            preferredVideo()
                            && additionalVideos().length === 0
                        "
                    >
                        <p class="text-sm italic text-sp-slate">
                            No additional videos added.
                        </p>
                    </template>
                </section>

            </div>
        </div>
    </template>
</div>
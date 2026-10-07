<div class="space-y-8">

    {{-- Article Details --}}
    <section
        class="rounded-md border border-sp-warmStone
               bg-sp-warmIvory p-6">
        <h2
            class="font-sans text-lg font-semibold text-sp-charcoal">
            Article Details
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Basic information about this article.
        </p>

        <div class="mt-6 space-y-6">

            {{-- Title --}}
            <div>
                <label
                    for="title"
                    class="block text-sm font-medium text-sp-charcoal">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old(
                        'title',
                        $article->title ?? ''
                    ) }}"
                    required
                    autofocus
                    autocomplete="off"
                    class="mt-2 block w-full rounded-md
                           border-sp-warmStone
                           bg-sp-warmIvory
                           text-sm text-sp-charcoal
                           focus:border-sp-prairieGreen
                           focus:ring-sp-prairieGreen">

                <x-admin.forms.field-error name="title" />
            </div>


            {{-- Type / Status --}}
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                {{-- Article Type --}}
                <div>
                    <label
                        for="type"
                        class="block text-sm font-medium text-sp-charcoal">
                        Article Type
                    </label>

                    <select
                        name="type"
                        id="type"
                        required
                        class="mt-2 block w-full rounded-md
                               border-sp-warmStone
                               bg-sp-warmIvory
                               text-sm text-sp-charcoal
                               focus:border-sp-prairieGreen
                               focus:ring-sp-prairieGreen">
                        <option
                            value="standard"
                            @selected(
                            old( 'type' ,
                            $article->type ?? 'standard'
                            ) === 'standard'
                            )
                            >
                            Standard Article
                        </option>

                        <option
                            value="guide"
                            @selected(
                            old( 'type' ,
                            $article->type ?? null
                            ) === 'guide'
                            )
                            >
                            Evergreen Guide
                        </option>

                        <option
                            value="book_review"
                            @selected(
                            old( 'type' ,
                            $article->type ?? null
                            ) === 'book_review'
                            )
                            >
                            Book Review
                        </option>
                    </select>

                    <x-admin.forms.field-error name="type" />
                </div>


                {{-- Status --}}
                <div>
                    <label
                        for="status"
                        class="block text-sm font-medium text-sp-charcoal">
                        Status
                    </label>

                    <select
                        name="status"
                        id="status"
                        required
                        class="mt-2 block w-full rounded-md
                               border-sp-warmStone
                               bg-sp-warmIvory
                               text-sm text-sp-charcoal
                               focus:border-sp-prairieGreen
                               focus:ring-sp-prairieGreen">
                        <option
                            value="draft"
                            @selected(
                            old( 'status' ,
                            $article->status ?? 'draft'
                            ) === 'draft'
                            )
                            >
                            Draft
                        </option>

                        <option
                            value="published"
                            @selected(
                            old( 'status' ,
                            $article->status ?? null
                            ) === 'published'
                            )
                            >
                            Published
                        </option>

                        <option
                            value="archived"
                            @selected(
                            old( 'status' ,
                            $article->status ?? null
                            ) === 'archived'
                            )
                            >
                            Archived
                        </option>
                    </select>

                    <x-admin.forms.field-error name="status" />
                </div>

            </div>

            {{-- Categories --}}
            <x-admin.forms.searchable-selector
                label="Categories"
                name="categories"
                :items="$categories"
                :selected="old(
        'categories',
        $selectedCategoryIds ?? []
    )"
                search-placeholder="Search categories..."
                empty-message="No categories have been created yet.">
                <x-admin.forms.field-error name="categories" />
                <x-admin.forms.field-error name="categories.*" />
            </x-admin.forms.searchable-selector>


            {{-- Excerpt --}}
            <div>
                <label
                    for="excerpt"
                    class="block text-sm font-medium text-sp-charcoal">
                    Excerpt
                </label>

                <textarea
                    name="excerpt"
                    id="excerpt"
                    rows="4"
                    class="mt-2 block w-full rounded-md
                           border-sp-warmStone
                           bg-sp-warmIvory
                           text-sm text-sp-charcoal
                           focus:border-sp-prairieGreen
                           focus:ring-sp-prairieGreen">{{ old(
                    'excerpt',
                    $article->excerpt ?? ''
                ) }}</textarea>

                <p class="mt-1 text-xs text-sp-slate">
                    A short summary used when introducing the article.
                </p>

                <x-admin.forms.field-error name="excerpt" />
            </div>

        </div>
    </section>


    {{-- Content --}}
    <section
        class="rounded-md border border-sp-warmStone
               bg-sp-warmIvory p-6">
        <h2
            class="font-sans text-lg font-semibold text-sp-charcoal">
            Content
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Write the main article content.
        </p>

        <div class="mt-6">
            <x-admin.forms.rich-text
                id="body-editor"
                name="body"
                :value="old(
                    'body',
                    $article->body ?? ''
                )" />

            <x-admin.forms.field-error name="body" />
        </div>
    </section>


    {{-- Actions --}}
    <div class="flex justify-end gap-4">

        <a
            href="{{ route('admin.learn.index') }}"
            class="inline-flex items-center justify-center
                   rounded-md border border-sp-warmStone
                   px-4 py-2 text-sm font-semibold
                   text-sp-charcoal hover:bg-sp-limestone/20">
            Cancel
        </a>

        <button
            type="submit"
            class="inline-flex items-center justify-center
                   rounded-md bg-sp-prairieGreen px-4 py-2
                   text-sm font-semibold
                   text-sp-warmIvory hover:bg-sp-prairieOchre">
            Save Article
        </button>

    </div>

</div>
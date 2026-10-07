<div class="space-y-8">

    {{-- Article Details --}}
    <section
        x-data="{
    articleType: @js(old('type', $article->type ?? 'standard'))
}"
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
                        x-model="articleType"
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

            {{-- Evergreen Guide Details --}}
<div
    x-show="articleType === 'guide'"
    x-cloak
    class="rounded-md border border-sp-warmStone
           bg-sp-limestone/30 p-4"
>
    <h3 class="text-sm font-semibold text-sp-charcoal">
        Evergreen Guide Details
    </h3>

    <p class="mt-1 text-xs text-sp-slate">
        Track when this guide was last reviewed for accuracy.
    </p>

    <div class="mt-4">
        <label
            for="last_reviewed_at"
            class="block text-sm font-medium text-sp-charcoal"
        >
            Last Reviewed
        </label>

        <input
            type="date"
            name="last_reviewed_at"
            id="last_reviewed_at"
            value="{{ old(
                'last_reviewed_at',
                isset($article) && $article->last_reviewed_at
                    ? $article->last_reviewed_at->format('Y-m-d')
                    : ''
            ) }}"
            class="mt-2 block w-full rounded-md
                   border-sp-warmStone
                   bg-sp-warmIvory
                   text-sm text-sp-charcoal
                   focus:border-sp-prairieGreen
                   focus:ring-sp-prairieGreen
                   md:max-w-xs"
        >

        <p class="mt-1 text-xs text-sp-slate">
            Leave blank until the guide has been reviewed.
        </p>

        <x-admin.forms.field-error name="last_reviewed_at" />
    </div>
</div>

            {{-- Categories --}}
            <div
                x-data="{
        addingCategory: {{ old('new_category_name') ? 'true' : 'false' }}
    }"
                class="space-y-4">
                <div class="flex items-end justify-between gap-4">
                    <div class="flex-1">
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
                    </div>
                </div>

                <div>
                    <button
                        type="button"
                        x-show="! addingCategory"
                        @click="addingCategory = true"
                        class="inline-flex items-center gap-2
                   text-sm font-semibold text-sp-prairieGreen
                   transition-colors hover:text-sp-prairieOchre">
                        <x-icons.plus class="h-4 w-4" />

                        Add Category
                    </button>
                </div>

                <div
                    x-show="addingCategory"
                    x-cloak
                    class="rounded-md border border-sp-warmStone
               bg-sp-limestone/30 p-4">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-sm font-semibold text-sp-charcoal">
                                New Category
                            </h3>

                            <p class="mt-1 text-xs text-sp-slate">
                                Create a category and assign it to this article.
                            </p>
                        </div>

                        <button
                            type="button"
                            @click="
                    addingCategory = false;
                    $refs.newCategoryName.value = '';
                    $refs.newCategoryDescription.value = '';
                "
                            class="text-sm font-semibold text-sp-slate
                       hover:text-sp-charcoal">
                            Cancel
                        </button>
                    </div>

                    <div class="mt-4 space-y-4">
                        <div>
                            <label
                                for="new_category_name"
                                class="block text-sm font-medium text-sp-charcoal">
                                Category Name
                            </label>

                            <input
                                x-ref="newCategoryName"
                                type="text"
                                name="new_category_name"
                                id="new_category_name"
                                value="{{ old('new_category_name') }}"
                                autocomplete="off"
                                class="mt-2 block w-full rounded-md
                           border-sp-warmStone
                           bg-sp-warmIvory
                           text-sm text-sp-charcoal
                           focus:border-sp-prairieGreen
                           focus:ring-sp-prairieGreen">

                            <x-admin.forms.field-error name="new_category_name" />
                        </div>

                        <div>
                            <label
                                for="new_category_description"
                                class="block text-sm font-medium text-sp-charcoal">
                                Description
                            </label>

                            <textarea
                                x-ref="newCategoryDescription"
                                name="new_category_description"
                                id="new_category_description"
                                rows="3"
                                class="mt-2 block w-full rounded-md
                           border-sp-warmStone
                           bg-sp-warmIvory
                           text-sm text-sp-charcoal
                           focus:border-sp-prairieGreen
                           focus:ring-sp-prairieGreen">{{ old('new_category_description') }}</textarea>

                            <p class="mt-1 text-xs text-sp-slate">
                                Optional. Describe what belongs in this category.
                            </p>

                            <x-admin.forms.field-error
                                name="new_category_description" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tags --}}
            <div
                x-data="{
        addingTag: {{ old('new_tag_name') ? 'true' : 'false' }}
    }"
                class="space-y-4">
                <div class="flex items-end justify-between gap-4">
                    <div class="flex-1">
                        <x-admin.forms.searchable-selector
                            label="Tags"
                            name="tags"
                            :items="$tags"
                            :selected="old(
                    'tags',
                    $selectedTagIds ?? []
                )"
                            search-placeholder="Search tags..."
                            empty-message="No tags have been created yet.">
                            <x-admin.forms.field-error name="tags" />
                            <x-admin.forms.field-error name="tags.*" />
                        </x-admin.forms.searchable-selector>
                    </div>
                </div>

                <div>
                    <button
                        type="button"
                        x-show="! addingTag"
                        @click="addingTag = true"
                        class="inline-flex items-center gap-2
                   text-sm font-semibold text-sp-prairieGreen
                   transition-colors hover:text-sp-prairieOchre">
                        <x-icons.plus class="h-4 w-4" />

                        Add Tag
                    </button>
                </div>

                <div
                    x-show="addingTag"
                    x-cloak
                    class="rounded-md border border-sp-warmStone
               bg-sp-limestone/30 p-4">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-sm font-semibold text-sp-charcoal">
                                New Tag
                            </h3>

                            <p class="mt-1 text-xs text-sp-slate">
                                Create a tag and assign it to this article.
                            </p>
                        </div>

                        <button
                            type="button"
                            @click="
                    addingTag = false;
                    $refs.newTagName.value = '';
                "
                            class="text-sm font-semibold text-sp-slate
                       hover:text-sp-charcoal">
                            Cancel
                        </button>
                    </div>

                    <div class="mt-4">
                        <label
                            for="new_tag_name"
                            class="block text-sm font-medium text-sp-charcoal">
                            Tag Name
                        </label>

                        <input
                            x-ref="newTagName"
                            type="text"
                            name="new_tag_name"
                            id="new_tag_name"
                            value="{{ old('new_tag_name') }}"
                            autocomplete="off"
                            class="mt-2 block w-full rounded-md
                       border-sp-warmStone
                       bg-sp-warmIvory
                       text-sm text-sp-charcoal
                       focus:border-sp-prairieGreen
                       focus:ring-sp-prairieGreen">

                        <x-admin.forms.field-error name="new_tag_name" />
                    </div>
                </div>
            </div>


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
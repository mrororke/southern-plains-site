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
           bg-sp-limestone/30 p-4">
                <h3 class="text-sm font-semibold text-sp-charcoal">
                    Evergreen Guide Details
                </h3>

                <p class="mt-1 text-xs text-sp-slate">
                    Track when this guide was last reviewed for accuracy.
                </p>

                <div class="mt-4">
                    <label
                        for="last_reviewed_at"
                        class="block text-sm font-medium text-sp-charcoal">
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
                   md:max-w-xs">

                    <p class="mt-1 text-xs text-sp-slate">
                        Leave blank until the guide has been reviewed.
                    </p>

                    <x-admin.forms.field-error name="last_reviewed_at" />
                </div>
            </div>

            {{-- Book Review Details --}}
            <div
                x-show="articleType === 'book_review'"
                x-cloak
                class="rounded-md border border-sp-warmStone
           bg-sp-limestone/30 p-4">
                <h3 class="text-sm font-semibold text-sp-charcoal">
                    Book Review Details
                </h3>

                <p class="mt-1 text-xs text-sp-slate">
                    Add the book information and cover used with this review.
                </p>

                <div class="mt-4 grid grid-cols-1 gap-6 md:grid-cols-2">
                    {{-- Book Title --}}
                    <div>
                        <label
                            for="book_title"
                            class="block text-sm font-medium text-sp-charcoal">
                            Book Title
                        </label>

                        <input
                            type="text"
                            name="book_title"
                            id="book_title"
                            value="{{ old(
                    'book_title',
                    $article->bookReview->book_title ?? ''
                ) }}"
                            class="mt-2 block w-full rounded-md
                       border-sp-warmStone
                       bg-sp-warmIvory
                       text-sm text-sp-charcoal
                       focus:border-sp-prairieGreen
                       focus:ring-sp-prairieGreen">

                        <x-admin.forms.field-error name="book_title" />
                    </div>

                    {{-- Author --}}
                    <div>
                        <label
                            for="book_author"
                            class="block text-sm font-medium text-sp-charcoal">
                            Author
                        </label>

                        <input
                            type="text"
                            name="book_author"
                            id="book_author"
                            value="{{ old(
                    'book_author',
                    $article->bookReview->book_author ?? ''
                ) }}"
                            class="mt-2 block w-full rounded-md
                       border-sp-warmStone
                       bg-sp-warmIvory
                       text-sm text-sp-charcoal
                       focus:border-sp-prairieGreen
                       focus:ring-sp-prairieGreen">

                        <x-admin.forms.field-error name="book_author" />
                    </div>
                </div>

                {{-- Rating --}}
                <div class="mt-6">
                    <label
                        for="rating"
                        class="block text-sm font-medium text-sp-charcoal">
                        Rating
                    </label>

                    <select
                        name="rating"
                        id="rating"
                        class="mt-2 block w-full rounded-md
                   border-sp-warmStone
                   bg-sp-warmIvory
                   text-sm text-sp-charcoal
                   focus:border-sp-prairieGreen
                   focus:ring-sp-prairieGreen
                   md:max-w-xs">
                        <option value="">Select a rating</option>

                        @foreach ([
                        '1',
                        '2',
                        '3',
                        '4',
                        '5',
                        ] as $rating)
                        <option
                            value="{{ $rating }}"
                            @selected(
                            (string) old( 'rating' ,
                            $article->bookReview->rating ?? ''
                            ) === $rating
                            )
                            >
                            {{ $rating }} {{ $rating === '1' ? 'star' : 'stars' }}
                        </option>
                        @endforeach
                    </select>

                    <x-admin.forms.field-error name="rating" />
                </div>

                {{-- Current Cover --}}
                @if (
                isset($article)
                && $article->bookReview
                && $article->bookReview->cover_image_path
                )
                <div class="mt-6">
                    <p class="block text-sm font-medium text-sp-charcoal">
                        Current Cover
                    </p>

                    <img
                        src="{{ Storage::disk('public')->url(
                    $article->bookReview->cover_image_path
                ) }}"
                        alt="Book cover for {{ $article->bookReview->book_title }}"
                        class="mt-2 max-h-64 w-auto rounded-md
                       border border-sp-warmStone">
                </div>
                @endif

                {{-- Cover Upload --}}
                <div class="mt-6">
                    <label
                        for="cover_image"
                        class="block text-sm font-medium text-sp-charcoal">
                        Book Cover
                    </label>

                    <input
                        type="file"
                        name="cover_image"
                        id="cover_image"
                        accept="image/jpeg,image/png,image/webp"
                        class="mt-2 block w-full text-sm text-sp-charcoal
                   file:mr-4 file:rounded-md file:border-0
                   file:bg-sp-prairieGreen file:px-4 file:py-2
                   file:text-sm file:font-semibold file:text-white
                   hover:file:bg-sp-prairieOchre">

                    <p class="mt-1 text-xs text-sp-slate">
                        JPEG, PNG, or WebP.
                        @if (
                        isset($article)
                        && $article->bookReview
                        && $article->bookReview->cover_image_path
                        )
                        Leave blank to keep the current cover.
                        @else
                        A cover is required for Book Reviews.
                        @endif
                    </p>

                    <x-admin.forms.field-error name="cover_image" />
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

    {{-- Publishing Options --}}
    <section
        class="rounded-md border border-sp-warmStone
           bg-sp-warmIvory p-6">

        <h2
            class="font-sans text-lg font-semibold text-sp-charcoal">
            Publishing Options
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Control additional publishing settings for this article.
        </p>

        <div class="mt-6">
            <label
                for="has_affiliate_links"
                class="flex cursor-pointer items-start gap-3">

                <input
                    type="checkbox"
                    name="has_affiliate_links"
                    id="has_affiliate_links"
                    value="1"
                    @checked(
                    old( 'has_affiliate_links' ,
                    $article->has_affiliate_links ?? false
                )
                )
                class="mt-1 rounded border-sp-warmStone
                text-sp-prairieGreen
                focus:ring-sp-prairieGreen">

                <span>
                    <span
                        class="block text-sm font-medium text-sp-charcoal">
                        Contains affiliate links
                    </span>

                    <span
                        class="mt-1 block text-xs text-sp-slate">
                        Automatically display an affiliate disclosure
                        with this article.
                    </span>
                </span>
            </label>

            <x-admin.forms.field-error
                name="has_affiliate_links" />
        </div>
    </section>

    {{-- Search Engine Optimization --}}
    <section
        class="rounded-md border border-sp-warmStone
           bg-sp-warmIvory p-6">

        <h2
            class="font-sans text-lg font-semibold text-sp-charcoal">
            Search Engine Optimization
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Control how this article may appear in search results.
        </p>

        <div class="mt-6 space-y-6">

            {{-- SEO Title --}}
            <div>
                <label
                    for="seo_title"
                    class="block text-sm font-medium text-sp-charcoal">
                    SEO Title
                </label>

                <input
                    type="text"
                    name="seo_title"
                    id="seo_title"
                    value="{{ old(
                    'seo_title',
                    $article->seo_title ?? ''
                ) }}"
                    maxlength="255"
                    autocomplete="off"
                    class="mt-2 block w-full rounded-md
                       border-sp-warmStone
                       bg-sp-warmIvory
                       text-sm text-sp-charcoal
                       focus:border-sp-prairieGreen
                       focus:ring-sp-prairieGreen">

                <p class="mt-1 text-xs text-sp-slate">
                    Optional. If left blank, the article title will be used.
                </p>

                <x-admin.forms.field-error name="seo_title" />
            </div>

            {{-- Meta Description --}}
            <div>
                <label
                    for="seo_description"
                    class="block text-sm font-medium text-sp-charcoal">
                    Meta Description
                </label>

                <textarea
                    name="seo_description"
                    id="seo_description"
                    rows="3"
                    class="mt-2 block w-full rounded-md
                       border-sp-warmStone
                       bg-sp-warmIvory
                       text-sm text-sp-charcoal
                       focus:border-sp-prairieGreen
                       focus:ring-sp-prairieGreen">{{ old(
                    'seo_description',
                    $article->seo_description ?? ''
                ) }}</textarea>

                <p class="mt-1 text-xs text-sp-slate">
                    Optional. If left blank, the article excerpt will be used.
                </p>

                <x-admin.forms.field-error name="seo_description" />
            </div>

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
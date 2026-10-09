@php
    $initialArticleImages = isset($article)
        ? $article->images->map(fn ($image) => [
            'id' => 'saved_' . $image->id,
            'databaseId' => $image->id,
            'fileName' => '',
            'imagePath' => $image->image_path,
            'altText' => $image->alt_text,
            'caption' => $image->caption ?? '',
            'displayType' => $image->display_type ?? 'image',
        ])->values()->all()
        : [];
    if (empty($initialArticleImages)) {
        $initialArticleImages = [[
            'id' => 'new_1', 'databaseId' => null, 'fileName' => '',
            'imagePath' => null, 'altText' => '', 'caption' => '', 'displayType' => 'image',
        ]];
    }
@endphp

<div

    x-data="{

        articleType: @js(old('type', $article->type ?? 'standard')),

        articleImages: @js($initialArticleImages),

        nextArticleImageId: 2,

        addArticleImage() {

            this.articleImages.push({

                id: `new_${this.nextArticleImageId++}`,
                databaseId: null,
                fileName: '',
                imagePath: null,
                altText: '',
                caption: '',
                displayType: 'image'

            });

            this.articleImages = [...this.articleImages];

        },

        removeArticleImage(id) {

            this.articleImages = this.articleImages.filter(

                image => image.id !== id

            );

        },

        moveArticleImageUp(index) {

            if (index === 0) {

                return;

            }

            const images = [...this.articleImages];

            [

                images[index - 1],

                images[index]

            ] = [

                images[index],

                images[index - 1]

            ];

            this.articleImages = images;

        },

        moveArticleImageDown(index) {

            if (index === this.articleImages.length - 1) {

                return;

            }

            const images = [...this.articleImages];

            [

                images[index],

                images[index + 1]

            ] = [

                images[index + 1],

                images[index]

            ];

            this.articleImages = images;

        }

    }"

    class="space-y-8">

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

                            )>

                            Standard Article

                        </option>

                        <option

                            value="guide"

                            @selected(

                            old( 'type' ,

                            $article->type ?? null

                            ) === 'guide'

                            )>

                            Evergreen Guide

                        </option>

                        <option

                            value="book_review"

                            @selected(

                            old( 'type' ,

                            $article->type ?? null

                            ) === 'book_review'

                            )>

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

                            )>

                            Draft

                        </option>

                        <option

                            value="published"

                            @selected(

                            old( 'status' ,

                            $article->status ?? null

                            ) === 'published'

                            )>

                            Published

                        </option>

                        <option

                            value="archived"

                            @selected(

                            old( 'status' ,

                            $article->status ?? null

                            ) === 'archived'

                            )>

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

                            )>

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

                <div

                    x-data="{ fileName: '' }"

                    class="mt-6">

                    <label

                        for="cover_image"

                        class="block text-sm font-medium text-sp-charcoal">

                        Book Cover

                    </label>

                    <div class="mt-2 flex flex-wrap items-center gap-3">

                        <label

                            for="cover_image"

                            class="inline-flex shrink-0 cursor-pointer

                                   items-center justify-center rounded-md

                                   bg-sp-prairieGreen px-4 py-2

                                   text-sm font-semibold text-white

                                   transition-colors

                                   hover:bg-sp-prairieOchre">

                            Choose File

                        </label>

                        <span

                            class="min-w-0 break-all text-sm text-sp-charcoal"

                            x-text="fileName || 'No file chosen'">

                        </span>

                    </div>

                    <input

                        type="file"

                        name="cover_image"

                        id="cover_image"

                        accept="image/jpeg,image/png,image/webp"

                        class="sr-only"

                        @change="fileName = $event.target.files[0]?.name || ''">

                    <p class="mt-2 text-xs text-sp-slate">

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

    {{-- Editor Layout --}}

    <div class="grid grid-cols-1 gap-8 xl:grid-cols-3">

        {{-- Main Editor --}}

        <div class="xl:col-span-2">

            {{-- Evergreen Guide Introduction --}}

            <section
                x-show="articleType === 'guide'"
                x-cloak
                class="mb-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

                <h2 class="font-sans text-lg font-semibold text-sp-charcoal">
                    Introduction
                </h2>

                <p class="mt-1 text-sm text-sp-slate">
                    Introduce the guide before its featured image. This is separate from the excerpt and main content.
                </p>

                <div class="mt-6">
                    <x-admin.forms.rich-text
                        id="introduction-editor"
                        name="introduction"
                        :value="old('introduction', $article->introduction ?? '')" />

                    <x-admin.forms.field-error name="introduction" />
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

        </div>

        {{-- Article Sidebar --}}

        <aside class="space-y-6">

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

                {{-- Affiliate Links --}}

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

                {{-- Featured Article --}}

                <div class="mt-6 border-t border-sp-warmStone pt-6">

                    <label

                        for="is_featured"

                        class="flex cursor-pointer items-start gap-3">

                        <input

                            type="checkbox"

                            name="is_featured"

                            id="is_featured"

                            value="1"

                            @checked(

                            old( 'is_featured' ,

                            $article->is_featured ?? false

                        )

                        )

                        class="mt-1 rounded border-sp-warmStone

                        text-sp-prairieGreen

                        focus:ring-sp-prairieGreen">

                        <span>

                            <span

                                class="block text-sm font-medium text-sp-charcoal">

                                Featured article

                            </span>

                            <span

                                class="mt-1 block text-xs text-sp-slate">

                                Feature this article prominently in the Learn section.

                                Book Reviews are not eligible to be featured.

                            </span>

                        </span>

                    </label>

                    <x-admin.forms.field-error name="is_featured" />

                </div>

            </section>

            {{-- Keep Learning --}}
            <section class="rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">
                <h2 class="font-sans text-lg font-semibold text-sp-charcoal">
                    Keep Learning
                </h2>
                <p class="mt-1 text-sm text-sp-slate">
                    Select up to four articles to recommend. Published selections
                    appear newest first. Leave empty to show no recommendations.
                </p>
                <div class="mt-6">
                    <x-admin.forms.searchable-selector
                        label="Related Articles"
                        name="related_articles"
                        :items="$availableRelatedArticles"
                        :selected="old('related_articles', $selectedRelatedArticleIds ?? [])"
                        search-placeholder="Search articles..."
                        empty-message="No other published articles available.">
                        <x-admin.forms.field-error name="related_articles" />
                        <x-admin.forms.field-error name="related_articles.*" />
                    </x-admin.forms.searchable-selector>
                </div>
            </section>

            {{-- Article Images --}}

            <section

                x-show="articleType !== 'book_review'"

                x-cloak

                class="rounded-md border border-sp-warmStone

                       bg-sp-warmIvory p-6">

                <h2

                    class="font-sans text-lg font-semibold text-sp-charcoal">

                    Article Images

                </h2>

                <p class="mt-1 text-sm text-sp-slate">

                    Add images for the article sidebar.

                </p>

                <div class="mt-6 space-y-6">

                    <template

                        x-for="(image, index) in articleImages"

                        :key="image.id">

                        <div

                            class="rounded-md border border-sp-warmStone

                                   bg-sp-limestone/30 p-4">

                            {{-- Image Header --}}

                            <div class="flex items-start justify-between gap-4">

                                <div>

                                    <h3

                                        class="text-sm font-semibold text-sp-charcoal"

                                        x-text="`Image ${index + 1}`">

                                    </h3>

                                    <p

                                        x-show="articleImages.length > 1"

                                        class="mt-1 text-xs text-sp-slate">

                                        Position

                                        <span x-text="index + 1"></span>

                                        of

                                        <span x-text="articleImages.length"></span>

                                    </p>

                                </div>

                                <button

                                    type="button"

                                    x-show="articleImages.length > 1"

                                    @click="removeArticleImage(image.id)"

                                    class="text-xs font-semibold text-sp-slate

                                           transition-colors

                                           hover:text-sp-charcoal">

                                    Remove

                                </button>

                            </div>

                            <div class="mt-4 space-y-4">
                                <input type="hidden" :name="`article_images[${image.id}][sort_order]`" :value="index">
                                <input type="hidden" :name="`article_images[${image.id}][id]`" :value="image.databaseId || ''">
                                <template x-if="image.imagePath">
                                    <div class="flex items-center gap-3">
                                        <img :src="`{{ Storage::disk('public')->url('') }}${image.imagePath}`"
                                             alt="Existing article image" class="h-20 w-20 rounded-md object-cover">
                                        <span class="text-xs text-sp-slate">Current image (choose a file to replace)</span>
                                    </div>
                                </template>

                                {{-- Image Upload --}}
                                <div>
                                    <label
                                        :for="`article_image_${image.id}`"
                                        class="block text-sm font-medium text-sp-charcoal">
                                        Image
                                    </label>

                                    <div class="mt-2 flex flex-wrap items-center gap-3">
                                        <label
                                            :for="`article_image_${image.id}`"
                                            class="inline-flex shrink-0 cursor-pointer items-center
                                                   justify-center rounded-md bg-sp-prairieGreen
                                                   px-4 py-2 text-sm font-semibold text-white
                                                   transition-colors hover:bg-sp-prairieOchre">
                                            Choose File
                                        </label>

                                        <span
                                            class="min-w-0 break-all text-sm text-sp-charcoal"
                                            x-text="image.fileName || 'No file chosen'">
                                        </span>
                                    </div>

                                    <input
                                        type="file"
                                        :name="`article_images[${image.id}][file]`"
                                        :id="`article_image_${image.id}`"
                                        accept="image/jpeg,image/png,image/webp"
                                        class="sr-only"
                                        @change="image.fileName = $event.target.files[0]?.name || ''">

                                    <p class="mt-2 text-xs text-sp-slate">
                                        JPEG, PNG, or WebP.
                                    </p>
                                </div>

{{-- Alt Text --}}

                                <div>

                                    <label

                                        :for="`article_image_alt_${image.id}`"

                                        class="block text-sm font-medium text-sp-charcoal">

                                        Alt Text

                                    </label>

                                    <input

                                        type="text"

                                        :id="`article_image_alt_${image.id}`"
                                        :name="`article_images[${image.id}][alt_text]`"
                                        x-model="image.altText"
                                        autocomplete="off"

                                        class="mt-2 block w-full rounded-md

                                               border-sp-warmStone

                                               bg-sp-warmIvory

                                               text-sm text-sp-charcoal

                                               focus:border-sp-prairieGreen

                                               focus:ring-sp-prairieGreen">

                                    <p class="mt-1 text-xs text-sp-slate">

                                        Required. Describe the image for someone

                                        who cannot see it.

                                    </p>

                                </div>

                                {{-- Caption --}}

                                <div>

                                    <label

                                        :for="`article_image_caption_${image.id}`"

                                        class="block text-sm font-medium text-sp-charcoal">

                                        Caption

                                    </label>

                                    <textarea

                                        :id="`article_image_caption_${image.id}`"
                                        :name="`article_images[${image.id}][caption]`"
                                        x-model="image.caption"
                                        rows="2"

                                        class="mt-2 block w-full rounded-md

                                               border-sp-warmStone

                                               bg-sp-warmIvory

                                               text-sm text-sp-charcoal

                                               focus:border-sp-prairieGreen

                                               focus:ring-sp-prairieGreen"></textarea>

                                    <p class="mt-1 text-xs text-sp-slate">

                                        Optional text displayed with the image.

                                    </p>

                                </div>

                                {{-- Display Type --}}

                                <div>

                                    <label

                                        :for="`article_image_type_${image.id}`"

                                        class="block text-sm font-medium text-sp-charcoal">

                                        Display

                                    </label>

                                    <select

                                        :id="`article_image_type_${image.id}`"
                                        :name="`article_images[${image.id}][display_type]`"
                                        x-model="image.displayType"
                                        class="mt-2 block w-full rounded-md

                                               border-sp-warmStone

                                               bg-sp-warmIvory

                                               text-sm text-sp-charcoal

                                               focus:border-sp-prairieGreen

                                               focus:ring-sp-prairieGreen">

                                        <option value="image">

                                            Image

                                        </option>

                                        <option value="figure">

                                            Figure

                                        </option>

                                    </select>

                                    <p class="mt-1 text-xs text-sp-slate">

                                        Figures are numbered automatically

                                        in display order.

                                    </p>

                                </div>

                                {{-- Reorder --}}

                                <div

                                    x-show="articleImages.length > 1"

                                    class="flex gap-2 border-t

                                           border-sp-warmStone pt-4">

                                    <button

                                        type="button"

                                        @click="moveArticleImageUp(index)"

                                        :disabled="index === 0"

                                        class="inline-flex flex-1 items-center

                                               justify-center rounded-md

                                               border border-sp-warmStone

                                               px-3 py-2 text-xs font-semibold

                                               text-sp-charcoal

                                               transition-colors

                                               hover:bg-sp-limestone/30

                                               disabled:cursor-not-allowed

                                               disabled:opacity-40">

                                        Move Up

                                    </button>

                                    <button

                                        type="button"

                                        @click="moveArticleImageDown(index)"

                                        :disabled="index === articleImages.length - 1"

                                        class="inline-flex flex-1 items-center

                                               justify-center rounded-md

                                               border border-sp-warmStone

                                               px-3 py-2 text-xs font-semibold

                                               text-sp-charcoal

                                               transition-colors

                                               hover:bg-sp-limestone/30

                                               disabled:cursor-not-allowed

                                               disabled:opacity-40">

                                        Move Down

                                    </button>

                                </div>

                            </div>

                        </div>

                    </template>

                </div>

                {{-- Add Image --}}

                <button

                    type="button"

                    @click="addArticleImage()"

                    class="mt-6 inline-flex items-center gap-2

                           text-sm font-semibold text-sp-prairieGreen

                           transition-colors hover:text-sp-prairieOchre">

                    <x-icons.plus class="h-4 w-4" />

                    Add Another Image

                </button>

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

                            rows="4"

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

                    {{-- Current OG Image --}}

                    @if (isset($article) && $article->og_image_path)

                    <div class="mt-4">

                        <p class="text-sm font-medium text-sp-charcoal">

                            Current Image

                        </p>

                        <img

                            src="{{ Storage::disk('public')->url($article->og_image_path) }}"

                            alt="Current Open Graph image for {{ $article->title }}"

                            class="mt-2 w-full rounded-md border border-sp-warmStone">

                        <label class="mt-3 flex cursor-pointer items-start gap-3">

                            <input

                                type="checkbox"

                                name="remove_og_image"

                                id="remove_og_image"

                                value="1"

                                @checked(old('remove_og_image', false))

                                class="mt-1 rounded border-sp-warmStone

                                           text-sp-prairieGreen

                                           focus:ring-sp-prairieGreen">

                            <span class="text-sm text-sp-charcoal">

                                Remove Image

                            </span>

                        </label>

                    </div>

                    @endif

                    {{-- Upload --}}

                    <div

                        x-data="{ fileName: '' }"

                        class="mt-4">

                        <div class="flex flex-wrap items-center gap-3">

                            <label

                                for="og_image"

                                class="inline-flex shrink-0 cursor-pointer

                                       items-center justify-center rounded-md

                                       bg-sp-prairieGreen px-4 py-2

                                       text-sm font-semibold text-white

                                       transition-colors

                                       hover:bg-sp-prairieOchre">

                                Choose File

                            </label>

                            <span

                                class="min-w-0 break-all text-sm text-sp-charcoal"

                                x-text="fileName || 'No file chosen'">

                            </span>

                        </div>

                        <input

                            type="file"

                            name="og_image"

                            id="og_image"

                            accept="image/jpeg,image/png,image/webp"

                            class="sr-only"

                            @change="fileName = $event.target.files[0]?.name || ''">

                        <p class="mt-2 text-xs text-sp-slate">

                            JPEG, PNG, or WebP.

                            @if (isset($article) && $article->og_image_path)

                            Leave blank to keep the current image.

                            @endif

                        </p>

                        <x-admin.forms.field-error name="og_image" />

                        <x-admin.forms.field-error name="remove_og_image" />

                    </div>

                </div>

    </div>

    </section>

    {{-- Actions --}}

    <section

        class="rounded-md border border-sp-warmStone

                       bg-sp-warmIvory p-6

                       xl:sticky xl:top-6">

        <div class="flex flex-col gap-3">

            <button

                type="submit"

                class="inline-flex w-full items-center justify-center

                               rounded-md bg-sp-prairieGreen px-4 py-2

                               text-sm font-semibold

                               text-sp-warmIvory

                               hover:bg-sp-prairieOchre">

                Save Article

            </button>

            <a

                href="{{ route('admin.learn.index') }}"

                class="inline-flex w-full items-center justify-center

                               rounded-md border border-sp-warmStone

                               px-4 py-2 text-sm font-semibold

                               text-sp-charcoal

                               hover:bg-sp-limestone/20">

                Cancel

            </a>

        </div>

    </section>

    </aside>

</div>

</div>

<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\LearnArticle;
use App\Models\LearnCategory;
use App\Models\LearnTag;
use App\Navigation\AdminNavigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class LearnController extends Controller
{
    /**
     * Display the Learn article library.
     */
    public function index(Request $request)
    {
        $articles = LearnArticle::query()
            ->with(['categories', 'tags'])
            ->latest('updated_at')
            ->paginate(25)
            ->withQueryString();
        return view('admin.dashboard-v2.learn.index', [
            'navigation' => AdminNavigation::items(),
            'articles' => $articles,
        ]);
    }
    /**
     * Show the form for creating a Learn article.
     */
    public function create()
    {
        return view('admin.dashboard-v2.learn.create', [
            'navigation' => AdminNavigation::items(),
            'categories' => LearnCategory::query()
                ->orderBy('name')
                ->get(),
            'tags' => LearnTag::query()
                ->orderBy('name')
                ->get(),
            'availableRelatedArticles' => LearnArticle::query()
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->get()
                ->map(fn (LearnArticle $relatedArticle) => (object) [
                    'id' => $relatedArticle->id,
                    'name' => $relatedArticle->title,
                ]),
            'selectedRelatedArticleIds' => [],
        ]);
    }
    /**
     * Store a newly created Learn article.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'related_articles' => ['nullable', 'array', 'max:4'],
            'related_articles.*' => ['integer', 'distinct', 'exists:learn_articles,id'],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'type' => [
                'required',
                'in:standard,guide,book_review',
            ],
            'status' => [
                'required',
                'in:draft,published,archived',
            ],
            'excerpt' => [
                'nullable',
                'string',
            ],
            'introduction' => [
                'nullable',
                'string',
            ],
            'seo_title' => [
                'nullable',
                'string',
                'max:255',
            ],
            'seo_description' => [
                'nullable',
                'string',
            ],
            'body' => [
                'required',
                'string',
            ],
            'last_reviewed_at' => [
                'nullable',
                'date',
            ],
            'has_affiliate_links' => [
                'nullable',
                'boolean',
            ],
            'is_featured' => [
                'nullable',
                'boolean',
            ],
            'categories' => [
                'nullable',
                'array',
            ],
            'categories.*' => [
                'integer',
                'exists:learn_categories,id',
            ],
            'new_category_name' => [
                'nullable',
                'string',
                'max:255',
            ],
            'new_category_description' => [
                'nullable',
                'string',
            ],
            'tags' => [
                'nullable',
                'array',
            ],
            'tags.*' => [
                'integer',
                'exists:learn_tags,id',
            ],
            'new_tag_name' => [
                'nullable',
                'string',
                'max:255',
            ],
            'book_title' => [
                'required_if:type,book_review',
                'nullable',
                'string',
                'max:255',
            ],
            'book_author' => [
                'required_if:type,book_review',
                'nullable',
                'string',
                'max:255',
            ],
            'rating' => [
                'nullable',
                'integer',
                'between:1,5',
            ],
            'cover_image' => [
                'required_if:type,book_review',
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'og_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_og_image' => ['nullable', 'boolean'],
            'article_images' => ['nullable', 'array'],
            'article_images.*.id' => ['nullable', 'integer'],
            'article_images.*.file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'article_images.*.alt_text' => ['nullable', 'string', 'max:255'],
            'article_images.*.caption' => ['nullable', 'string'],
            'article_images.*.display_type' => ['required_with:article_images', 'in:image,figure'],
            'article_images.*.sort_order' => ['required_with:article_images', 'integer', 'min:0'],
        ]);
        /*
         * Generate a unique slug for the article.
         */
        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 2;
        while (
            LearnArticle::where('slug', $slug)->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }
        /*
         * Create the article.
         */
        $article = LearnArticle::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'type' => $validated['type'],
            'status' => $validated['status'],
            'excerpt' => $validated['excerpt'] ?? null,
            'introduction' => $validated['type'] === 'guide'
                ? ($validated['introduction'] ?? null)
                : null,
            'body' => $validated['body'],
            'seo_title' => $validated['seo_title'] ?? null,
            'seo_description' => $validated['seo_description'] ?? null,
            'last_reviewed_at' =>
                $validated['type'] === 'guide'
                    ? ($validated['last_reviewed_at'] ?? null)
                    : null,
            'has_affiliate_links' =>
                $request->boolean('has_affiliate_links'),
            'is_featured' =>
                $validated['type'] !== 'book_review'
                && $request->boolean('is_featured'),
            'published_at' =>
                $validated['status'] === 'published'
                    ? now()
                    : null,
        ]);
        /*
         * Collect any existing categories selected
         * in the form.
         */
        $categoryIds = $validated['categories'] ?? [];
        /*
         * If a new category was entered, create it
         * and include it with the selected categories.
         */
        if (! empty($validated['new_category_name'])) {
            $categoryName = trim(
                $validated['new_category_name']
            );
            $category = LearnCategory::firstOrCreate(
                [
                    'slug' => Str::slug($categoryName),
                ],
                [
                    'name' => $categoryName,
                    'description' =>
                        $validated['new_category_description']
                        ?? null,
                ]
            );
            $categoryIds[] = $category->id;
        }
        $article->categories()->sync(
            array_unique($categoryIds)
        );
        /*
         * Collect any existing tags selected
         * in the form.
         */
        $tagIds = $validated['tags'] ?? [];
        /*
         * If a new tag was entered, create it
         * and include it with the selected tags.
         */
        if (! empty($validated['new_tag_name'])) {
            $tagName = trim(
                $validated['new_tag_name']
            );
            $tag = LearnTag::firstOrCreate(
                [
                    'slug' => Str::slug($tagName),
                ],
                [
                    'name' => $tagName,
                ]
            );
            $tagIds[] = $tag->id;
        }
        $article->tags()->sync(
            array_unique($tagIds)
        );
        $article->relatedArticles()->sync($validated['related_articles'] ?? []);
        /*
         * Create Book Review metadata and store
         * its cover when applicable.
         */
        if ($validated['type'] === 'book_review') {
            $coverPath = $request
                ->file('cover_image')
                ->store(
                    'learn/book-covers',
                    'public'
                );
            $article->bookReview()->create([
                'book_title' => $validated['book_title'],
                'book_author' => $validated['book_author'],
                'rating' => $validated['rating'] ?? null,
                'cover_image_path' => $coverPath,
            ]);
        }
        $this->saveArticleMedia($request, $article, $validated);
        return redirect()
            ->route('admin.learn.index')
            ->with(
                'success',
                'Article created successfully.'
            );
    }
    /**
     * Show the form for editing a Learn article.
     */
    public function edit(LearnArticle $article)
    {
        $article->load([
            'categories',
            'tags',
            'bookReview',
            'images',
        ]);
        return view('admin.dashboard-v2.learn.edit', [
            'navigation' => AdminNavigation::items(),
            'article' => $article,
            'categories' => LearnCategory::query()
                ->orderBy('name')
                ->get(),
            'selectedCategoryIds' => $article->categories
                ->pluck('id')
                ->all(),
            'tags' => LearnTag::query()
                ->orderBy('name')
                ->get(),
            'selectedTagIds' => $article->tags
                ->pluck('id')
                ->all(),
            'availableRelatedArticles' => LearnArticle::query()
                ->whereKeyNot($article->id)
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->get()
                ->map(fn (LearnArticle $relatedArticle) => (object) [
                    'id' => $relatedArticle->id,
                    'name' => $relatedArticle->title,
                ]),
            'selectedRelatedArticleIds' => $article->relatedArticles()
                ->pluck('learn_articles.id')
                ->all(),
        ]);
    }
    /**
     * Update an existing Learn article.
     */
    public function update(
        Request $request,
        LearnArticle $article
    ) {
        $article->load('bookReview');
        $validated = $request->validate([
            'related_articles' => ['nullable', 'array', 'max:4'],
            'related_articles.*' => ['integer', 'distinct', 'exists:learn_articles,id'],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'type' => [
                'required',
                'in:standard,guide,book_review',
            ],
            'status' => [
                'required',
                'in:draft,published,archived',
            ],
            'excerpt' => [
                'nullable',
                'string',
            ],
            'introduction' => [
                'nullable',
                'string',
            ],
            'seo_title' => [
                'nullable',
                'string',
                'max:255',
            ],
            'seo_description' => [
                'nullable',
                'string',
            ],
            'body' => [
                'required',
                'string',
            ],
            'last_reviewed_at' => [
                'nullable',
                'date',
            ],
            'has_affiliate_links' => [
                'nullable',
                'boolean',
            ],
            'is_featured' => [
                'nullable',
                'boolean',
            ],
            'categories' => [
                'nullable',
                'array',
            ],
            'categories.*' => [
                'integer',
                'exists:learn_categories,id',
            ],
            'new_category_name' => [
                'nullable',
                'string',
                'max:255',
            ],
            'new_category_description' => [
                'nullable',
                'string',
            ],
            'tags' => [
                'nullable',
                'array',
            ],
            'tags.*' => [
                'integer',
                'exists:learn_tags,id',
            ],
            'new_tag_name' => [
                'nullable',
                'string',
                'max:255',
            ],
            'book_title' => [
                'required_if:type,book_review',
                'nullable',
                'string',
                'max:255',
            ],
            'book_author' => [
                'required_if:type,book_review',
                'nullable',
                'string',
                'max:255',
            ],
            'rating' => [
                'nullable',
                'integer',
                'between:1,5',
            ],
            'cover_image' => [
                $request->input('type') === 'book_review'
                    && ! $article->bookReview
                        ? 'required'
                        : 'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'og_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_og_image' => ['nullable', 'boolean'],
            'article_images' => ['nullable', 'array'],
            'article_images.*.id' => ['nullable', 'integer'],
            'article_images.*.file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'article_images.*.alt_text' => ['nullable', 'string', 'max:255'],
            'article_images.*.caption' => ['nullable', 'string'],
            'article_images.*.display_type' => ['required_with:article_images', 'in:image,figure'],
            'article_images.*.sort_order' => ['required_with:article_images', 'integer', 'min:0'],
        ]);
        if (in_array($article->id, $validated['related_articles'] ?? [], false)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'related_articles' => 'An article cannot recommend itself.',
            ]);
        }
        /*
         * Generate a new slug only if the title changed.
         */
        if ($validated['title'] !== $article->title) {
            $baseSlug = Str::slug($validated['title']);
            $slug = $baseSlug;
            $counter = 2;
            while (
                LearnArticle::where('slug', $slug)
                    ->whereKeyNot($article->id)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }
            $article->slug = $slug;
        }
        /*
         * Set the publication date the first time
         * an article becomes published.
         */
        if (
            $validated['status'] === 'published'
            && is_null($article->published_at)
        ) {
            $article->published_at = now();
        }
        /*
         * Update the article.
         */
        $article->fill([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'status' => $validated['status'],
            'excerpt' => $validated['excerpt'] ?? null,
            'introduction' => $validated['type'] === 'guide'
                ? ($validated['introduction'] ?? null)
                : null,
            'body' => $validated['body'],
            'seo_title' => $validated['seo_title'] ?? null,
            'seo_description' => $validated['seo_description'] ?? null,
            'last_reviewed_at' =>
                $validated['type'] === 'guide'
                    ? ($validated['last_reviewed_at'] ?? null)
                    : null,
            'has_affiliate_links' =>
                $request->boolean('has_affiliate_links'),
            'is_featured' =>
                $validated['type'] !== 'book_review'
                && $request->boolean('is_featured'),
        ]);
        $article->save();
        /*
         * Collect any existing categories selected
         * in the form.
         */
        $categoryIds = $validated['categories'] ?? [];
        if (! empty($validated['new_category_name'])) {
            $categoryName = trim(
                $validated['new_category_name']
            );
            $category = LearnCategory::firstOrCreate(
                [
                    'slug' => Str::slug($categoryName),
                ],
                [
                    'name' => $categoryName,
                    'description' =>
                        $validated['new_category_description']
                        ?? null,
                ]
            );
            $categoryIds[] = $category->id;
        }
        $article->categories()->sync(
            array_unique($categoryIds)
        );
        /*
         * Collect any existing tags selected
         * in the form.
         */
        $tagIds = $validated['tags'] ?? [];
        if (! empty($validated['new_tag_name'])) {
            $tagName = trim(
                $validated['new_tag_name']
            );
            $tag = LearnTag::firstOrCreate(
                [
                    'slug' => Str::slug($tagName),
                ],
                [
                    'name' => $tagName,
                ]
            );
            $tagIds[] = $tag->id;
        }
        $article->tags()->sync(
            array_unique($tagIds)
        );
        $article->relatedArticles()->sync($validated['related_articles'] ?? []);
        /*
         * Create or update Book Review metadata.
         */
        if ($validated['type'] === 'book_review') {
            $coverPath = $article->bookReview
                ? $article->bookReview->cover_image_path
                : null;
            /*
             * Replace the existing cover when
             * a new file has been uploaded.
             */
            if ($request->hasFile('cover_image')) {
                $newCoverPath = $request
                    ->file('cover_image')
                    ->store(
                        'learn/book-covers',
                        'public'
                    );
                if (
                    $coverPath
                    && Storage::disk('public')->exists(
                        $coverPath
                    )
                ) {
                    Storage::disk('public')->delete(
                        $coverPath
                    );
                }
                $coverPath = $newCoverPath;
            }
            $article->bookReview()->updateOrCreate(
                [
                    'article_id' => $article->id,
                ],
                [
                    'book_title' => $validated['book_title'],
                    'book_author' => $validated['book_author'],
                    'rating' => $validated['rating'] ?? null,
                    'cover_image_path' => $coverPath,
                ]
            );
        } elseif ($article->bookReview) {
            /*
             * If this article is no longer a Book Review,
             * remove its old cover and metadata.
             */
            $coverPath =
                $article->bookReview->cover_image_path;
            if (
                $coverPath
                && Storage::disk('public')->exists(
                    $coverPath
                )
            ) {
                Storage::disk('public')->delete(
                    $coverPath
                );
            }
            $article->bookReview->delete();
        }
        $this->saveArticleMedia($request, $article, $validated);
        return redirect()
            ->route('admin.learn.index')
            ->with(
                'success',
                'Article updated successfully.'
            );
    }
    /**
     * Persist OG image and ordered article images. Existing images omitted from
     * the submitted list are removed; a blank new row is ignored.
     */
    private function saveArticleMedia(Request $request, LearnArticle $article, array $validated): void
    {
        $disk = Storage::disk('public');
        $previousOg = $article->og_image_path;
        if ($request->hasFile('og_image')) {
            $article->og_image_path = $request->file('og_image')->store('learn/og-images', 'public');
            $article->save();
            if ($previousOg) {
                $disk->delete($previousOg);
            }
        } elseif ($request->boolean('remove_og_image') && $previousOg) {
            $article->og_image_path = null;
            $article->save();
            $disk->delete($previousOg);
        }
        // Book reviews do not use the article-image sidebar.
        if ($article->type === 'book_review') {
            return;
        }
        $submitted = collect($validated['article_images'] ?? [])
            ->sortBy('sort_order');
        $existing = $article->images()->get()->keyBy('id');
        $retained = [];
        $filesToDelete = [];
        $position = 0;
        DB::transaction(function () use ($submitted, $request, $article, $existing, &$retained, &$filesToDelete, &$position) {
            foreach ($submitted as $rowKey => $row) {
                $id = isset($row['id']) ? (int) $row['id'] : null;
                $image = $id ? $existing->get($id) : null;
                if ($id && ! $image) {
                    abort(422, 'An article image does not belong to this article.');
                }
                // Uploaded file stays tied to the stable Alpine row key.
                $upload = $request->file('article_images.' . $rowKey . '.file');
                if (! $image && ! $upload) {
                    continue;
                }
                $alt = trim($row['alt_text'] ?? '');
                if ($alt === '') {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        'article_images' => 'Alt text is required for every uploaded article image.',
                    ]);
                }
                if (! $image) {
                    $image = $article->images()->make();
                }
                if ($upload) {
                    $newPath = $upload->store('learn/article-images', 'public');
                    if ($image->image_path) {
                        $filesToDelete[] = $image->image_path;
                    }
                    $image->image_path = $newPath;
                }
                $image->alt_text = $alt;
                $image->caption = $row['caption'] ?? null;
                $image->display_type = $row['display_type'] ?? 'image';
                $image->sort_order = $position++;
                $image->save();
                $retained[] = $image->id;
            }
            foreach ($existing as $oldImage) {
                if (! in_array($oldImage->id, $retained, true)) {
                    $filesToDelete[] = $oldImage->image_path;
                    $oldImage->delete();
                }
            }
        });
        foreach ($filesToDelete as $path) {
            if ($path) {
                $disk->delete($path);
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearnArticle;
use App\Models\LearnCategory;
use App\Models\LearnTag;
use App\Navigation\AdminNavigation;
use Illuminate\Http\Request;
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
        ]);
    }

    /**
     * Store a newly created Learn article.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
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
            'body' => [
                'required',
                'string',
            ],
            'last_reviewed_at' => [
                'nullable',
                'date',
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
            'body' => $validated['body'],
            'last_reviewed_at' =>
                $validated['type'] === 'guide'
                    ? ($validated['last_reviewed_at'] ?? null)
                    : null,
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
        ]);
    }

    /**
     * Update an existing Learn article.
     */
    public function update(
        Request $request,
        LearnArticle $article
    ) {
        $validated = $request->validate([
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
            'body' => [
                'required',
                'string',
            ],
            'last_reviewed_at' => [
                'nullable',
                'date',
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
        ]);

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
            'body' => $validated['body'],
            'last_reviewed_at' =>
                $validated['type'] === 'guide'
                    ? ($validated['last_reviewed_at'] ?? null)
                    : null,
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

        return redirect()
            ->route('admin.learn.index')
            ->with(
                'success',
                'Article updated successfully.'
            );
    }
}
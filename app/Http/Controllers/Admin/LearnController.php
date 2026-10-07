<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearnArticle;
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
        ]);
    }

    /**
     * Store a newly created Learn article.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => [
                'required',
                'in:standard,guide,book_review',
            ],
            'status' => [
                'required',
                'in:draft,published,archived',
            ],
            'excerpt' => ['nullable', 'string'],
            'body' => ['required', 'string'],
        ]);

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 2;

        while (
            LearnArticle::where('slug', $slug)->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $article = LearnArticle::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'type' => $validated['type'],
            'status' => $validated['status'],
            'excerpt' => $validated['excerpt'] ?? null,
            'body' => $validated['body'],
            'published_at' => $validated['status'] === 'published'
                ? now()
                : null,
        ]);

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
        return view('admin.dashboard-v2.learn.edit', [
            'navigation' => AdminNavigation::items(),
            'article' => $article,
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
            'title' => ['required', 'string', 'max:255'],
            'type' => [
                'required',
                'in:standard,guide,book_review',
            ],
            'status' => [
                'required',
                'in:draft,published,archived',
            ],
            'excerpt' => ['nullable', 'string'],
            'body' => ['required', 'string'],
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
     * Set the publication date the first time an article
     * becomes published.
     */
        if (
            $validated['status'] === 'published'
            && is_null($article->published_at)
        ) {
            $article->published_at = now();
        }

        $article->fill([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'status' => $validated['status'],
            'excerpt' => $validated['excerpt'] ?? null,
            'body' => $validated['body'],
        ]);

        $article->save();

        return redirect()
            ->route('admin.learn.index')
            ->with(
                'success',
                'Article updated successfully.'
            );
    }
}

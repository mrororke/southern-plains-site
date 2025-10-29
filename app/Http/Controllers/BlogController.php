<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the main Blog Index page (/blog)
     */
    public function index(Request $request)
    {
        // 1. Fetch Categories and Tags (needed for the sidebar/filter components)
        // NOTE: I'm updating the orderBy to match your existing 'name', 'asc'
        $categories = Category::withCount(['posts' => fn($q) => $q->whereNotNull('published_at')])
            ->having('posts_count', '>', 0)
            ->orderBy('name', 'asc')
            ->get();

        $tags = Tag::withCount(['posts' => fn($q) => $q->whereNotNull('published_at')])
            ->having('posts_count', '>', 0)
            ->orderBy('name', 'asc')
            ->get();

        // 2. Start the base query for all posts
        $query = Post::whereNotNull('published_at')
            ->orderBy('published_at', 'desc');

        // 3. Apply Search Filter
        if ($request->has('search') && $request->input('search') != '') {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('body', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // 4. Apply Category Filter
        if ($request->has('category') && $request->input('category') != '') {
            $categorySlug = $request->input('category');

            // Find the category ID based on the slug from the form
            $category = Category::where('slug', $categorySlug)->first();

            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // 5. Execute the final, filtered query with pagination
        $allPostsOnPage = $query->paginate(15);
        // This executes the query (including any search or category filters)

        return view('blog.index', compact(
            'allPostsOnPage',
            'categories',
            'tags'
        ));
    }

    /**
     * Display posts filtered by a specific Category (/blog/category/{slug})
     */
    public function category(Category $category)
    {
        $posts = $category->posts()
            ->whereNotNull('published_at') // Only show published posts
            ->latest('published_at')
            ->paginate(15);

        // ADDED LOGIC TO FETCH SIDEBAR DATA
        $categories = Category::withCount(['posts' => fn($q) => $q->whereNotNull('published_at')])
            ->having('posts_count', '>', 0)
            ->orderBy('name', 'asc')
            ->get();

        $tags = Tag::withCount(['posts' => fn($q) => $q->whereNotNull('published_at')])
            ->having('posts_count', '>', 0)
            ->orderBy('name', 'asc')
            ->get();
        // END: ADDED LOGIC

        // Pass the posts and the category object to the filter view
        return view('blog.category-index', compact('posts', 'category', 'categories', 'tags'));
    }

    /**
     * Display posts filtered by a specific Tag (/blog/tag/{slug})
     */
    public function tag(Tag $tag)
    {
        $posts = $tag->posts()
            ->whereNotNull('published_at') // Only show published posts
            ->latest('published_at')
            ->paginate(10);

            // START: ADDED LOGIC TO FETCH SIDEBAR DATA
    $categories = Category::withCount(['posts' => fn($q) => $q->whereNotNull('published_at')])
                            ->having('posts_count', '>', 0)
                            ->orderBy('name', 'asc')
                            ->get();

    $tags = Tag::withCount(['posts' => fn($q) => $q->whereNotNull('published_at')])
                ->having('posts_count', '>', 0)
                ->orderBy('name', 'asc')
                ->get();
    // END: ADDED LOGIC

        // Pass the posts and the tag object to the filter view
        return view('blog.tag-index', compact('posts', 'tag', 'categories', 'tags'));
    }

    /**
     * Display a single post (/blog/{slug})
     */
    public function show(Post $post)
    {
        // Ensure the post is published before showing it publicly
        if (!$post->published_at) {
            abort(404);
        }

        $post->load('category', 'tags'); // Eager load for the view
        return view('blog.show', compact('post'));
    }
}

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
    public function index()
    {
        // 1. Fetch Main and Archive Posts
        // You'll replace these with actual database queries once you are ready.
        $latestPosts = Post::orderBy('published_at', 'desc')->take(3)->get();
        $archivePosts = Post::orderBy('published_at', 'desc')->skip(3)->take(5)->get();

        // 2. Fetch Categories with Post Counts (for the sidebar)
        $categories = Category::withCount(['posts' => function ($query) {
            $query->whereNotNull('published_at'); // Only count published posts
        }])->having('posts_count', '>', 0)->orderBy('posts_count', 'desc')->get();

        // 3. Fetch Tags with Usage Counts (for the tag cloud)
        $tags = Tag::withCount(['posts' => function ($query) {
            $query->whereNotNull('published_at'); // Only count usage on published posts
        }])->having('posts_count', '>', 0)->orderBy('posts_count', 'desc')->get();

        return view('blog.index', compact(
            'latestPosts',
            'archivePosts',
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
            ->paginate(10);

        // Pass the posts and the category object to the filter view
        return view('blog.category-index', compact('posts', 'category'));
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

        // Pass the posts and the tag object to the filter view
        return view('blog.tag-index', compact('posts', 'tag'));
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

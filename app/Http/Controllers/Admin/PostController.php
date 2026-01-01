<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all posts, ordered by creation date, and paginate them
        $posts = Post::with('category') // Eager load the category for display
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        // Pass the posts collection to the index view
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all categories and tags needed for dropdowns and checklists
        $categories = Category::all();
        $tags = Tag::all();

        // Pass this data to the creation view
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validation
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                // Ensure the title is unique in the posts table
                Rule::unique('posts', 'title'),
            ],
            'category_id' => 'required|exists:categories,id', // Must be a valid category ID
            'meta_description' => 'nullable|string|max:200',
            'body' => 'required|string',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Ensure all submitted tags are valid IDs
        ]);

        // 2. Prepare Data and Create Post

        // Add the automatically generated slug to the data array
        $validated['slug'] = Str::slug($validated['title']);

        // Use the authenticated user's ID as the author (if you added a user_id column)
        // If not, you can skip this, but it's good practice. (Assuming current user is the author)
        // $validated['user_id'] = auth()->id(); 

        // Create the post record
        $post = Post::create($validated);

        // 3. Attach Tags (Synchronization)
        if ($request->has('tags')) {
            // The sync method takes an array of IDs and updates the pivot table (post_tag)
            // It attaches new tags and detaches any that were unchecked.
            $post->tags()->sync($request->tags);
        }

        // 4. Redirect with Success Message
        return redirect()->route('admin.posts.index')
            ->with('success', 'Post "' . $post->title . '" created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // The $post variable is automatically found by Laravel's Route Model Binding.

        // Eager load relationships needed for the view (category and tags)
        $post->load('category', 'tags');

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Fetch all tags and categories
        $categories = Category::all();
        $tags = Tag::all();

        // 💡 GUARANTEE FIX: Create a simple, flat array of attached Tag IDs
        // This is the cleanest data structure for the Blade check.
        $attachedTagIds = $post->tags->pluck('id')->toArray();

        // Pass the post, all tags/categories, AND the array of attached IDs to the view.
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'attachedTagIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                // CRITICAL: Ignore the current post's ID when checking for uniqueness
                Rule::unique('posts', 'title')->ignore($post->id),
            ],
            'category_id' => 'required|exists:categories,id',
            'meta_description' => 'nullable|string|max:200',
            'body' => 'required|string',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        // 1. Update the post record
        $validated['slug'] = Str::slug($validated['title']);
        $post->update($validated);

        // 2. Sync Tags
        $post->tags()->sync($request->tags ?? []);

        // 3. Redirect (The new, simpler redirect)
        return redirect('admin/posts') // 💡 USE THE SIMPLE URI INSTEAD OF route()
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $title = $post->title;
        $post->delete();

        return redirect('admin/posts')
            ->with('success', 'Post "' . $title . '" deleted successfully.');
    }
}

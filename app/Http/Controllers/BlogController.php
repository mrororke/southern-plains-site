<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Services\Blog\BlogSidebarService;
use App\Services\Blog\PostQueryService;
use App\Http\Requests\Blog\BlogIndexRequest;


class BlogController extends Controller
{
    public function index(
        BlogIndexRequest $request,
        PostQueryService $posts,
        BlogSidebarService $sidebar
    ) {
        $allPostsOnPage = $posts->index(
            $request->filters()
        );

        return view('blog.index', array_merge(
            compact('allPostsOnPage'),
            $sidebar->get()
        ));
    }

    public function category(
        Category $category,
        PostQueryService $posts,
        BlogSidebarService $sidebar
    ) {
        $categoryPosts = $posts->byCategory($category);

        return view('blog.category-index', array_merge(
            compact('categoryPosts', 'category'),
            $sidebar->get()
        ));
    }

    public function tag(
        Tag $tag,
        PostQueryService $posts,
        BlogSidebarService $sidebar
    ) {
        $tagPosts = $posts->byTag($tag);

        return view('blog.tag-index', array_merge(
            compact('tagPosts', 'tag'),
            $sidebar->get()
        ));
    }

    public function show(Post $post)
    {
        abort_unless($post->published_at, 404);

        $post->load('category', 'tags');

        return view('blog.show', compact('post'));
    }
}

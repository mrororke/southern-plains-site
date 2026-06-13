class BlogController extends Controller
{
    public function index(Request $request, PostQueryService $posts, BlogSidebarService $sidebar)
    {
        $allPostsOnPage = $posts->index($request->only([
            'search',
            'category'
        ]));

        return view('blog.index', array_merge(
            compact('allPostsOnPage'),
            $sidebar->get()
        ));
    }

    public function category(Category $category, PostQueryService $posts, BlogSidebarService $sidebar)
    {
        $posts = $posts->byCategory($category);

        return view('blog.category-index', array_merge(
            compact('posts', 'category'),
            $sidebar->get()
        ));
    }

    public function tag(Tag $tag, PostQueryService $posts, BlogSidebarService $sidebar)
    {
        $posts = $posts->byTag($tag);

        return view('blog.tag-index', array_merge(
            compact('posts', 'tag'),
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
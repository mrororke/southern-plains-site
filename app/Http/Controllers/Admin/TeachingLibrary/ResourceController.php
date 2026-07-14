<?php

namespace App\Http\Controllers\Admin\TeachingLibrary;

use App\Http\Controllers\Controller;

use App\Http\Requests\TeachingLibrary\StoreResourceRequest;
use App\Http\Requests\TeachingLibrary\UpdateResourceRequest;

use App\Models\Trick;

use App\Models\TeachingLibrary\Resource;
use App\Models\TeachingLibrary\ResourceCategory;
use App\Models\TeachingLibrary\ResourceTag;
use App\Models\TeachingLibrary\ResourceAudience;

use Illuminate\Http\Request;


class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Resource::with([
            'category',
            'tags',
            'tricks',
        ])
            ->withCount('tricks');


        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('internal_title', 'like', "%{$search}%")
                    ->orWhere('email_subject', 'like', "%{$search}%")
                    ->orWhere('summary', 'like', "%{$search}%");

            });

        }


        if ($request->filled('category')) {

            $query->where(
                'resource_category_id',
                $request->category
            );

        }


        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );

        }


        if ($request->boolean('template')) {

            $query->where('is_template', true);

        }


        switch ($request->get('sort')) {

            case 'oldest':

                $query->orderBy('updated_at', 'asc');

                break;


            case 'alpha':

                $query->orderBy('internal_title', 'asc');

                break;


            case 'alpha_desc':

                $query->orderBy('internal_title', 'desc');

                break;


            case 'behaviors':

                $query->orderBy('tricks_count', 'desc');

                break;


            case 'created':

                $query->orderBy('created_at', 'desc');

                break;


            default:

                $query->orderBy('updated_at', 'desc');

                break;

        }


        $resources = $query
            ->paginate(25)
            ->withQueryString();


        $categories = ResourceCategory::orderBy('name')->get();


        $stats = [
            'total' => Resource::count(),
            'drafts' => Resource::where('status', 'draft')->count(),
            'published' => Resource::where('status', 'published')->count(),
            'templates' => Resource::where('is_template', true)->count(),
        ];


        return view(
            'admin.teaching-library.resources.index',
            compact(
                'resources',
                'categories',
                'stats'
            )
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ResourceCategory::orderBy('name')->get();

        $tags = ResourceTag::orderBy('name')->get();

        $audiences = ResourceAudience::orderBy('name')->get();

        $tricks = Trick::with('videos')
            ->orderBy('name')
            ->get();


        return view(
            'admin.teaching-library.resources.create',
            compact(
                'categories',
                'tags',
                'audiences',
                'tricks'
            )
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourceRequest $request)
    {
        $resource = Resource::create(
            $request->validated()
        );


        $resource->tricks()->sync(
            $request->tricks ?? []
        );


        $resource->tags()->sync(
            $request->tags ?? []
        );


        $resource->audiences()->sync(
            $request->audiences ?? []
        );


        return redirect()
            ->route('admin.teaching-library.resources.index')
            ->with('success', 'Resource created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        $resource->load([
            'category',
            'tags',
            'audiences',
            'tricks.levels',
            'tricks.videos',
            'tricks.preferredVideo',
            'author',
            'updatedBy',
        ]);


        $relatedResources = $resource
            ->relatedResources()
            ->limit(5)
            ->get();


        return view(
            'admin.teaching-library.resources.show',
            compact(
                'resource',
                'relatedResources'
            )
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        $categories = ResourceCategory::orderBy('name')->get();

        $tags = ResourceTag::orderBy('name')->get();

        $audiences = ResourceAudience::orderBy('name')->get();

        $tricks = Trick::with('videos')
            ->orderBy('name')
            ->get();


        $resource->load([
            'tags',
            'audiences',
            'tricks'
        ]);


        return view(
            'admin.teaching-library.resources.edit',
            compact(
                'resource',
                'categories',
                'tags',
                'audiences',
                'tricks'
            )
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResourceRequest $request, Resource $resource)
    {
        $resource->update(
            $request->validated()
        );


        $resource->tricks()->sync(
            $request->tricks ?? []
        );


        $resource->tags()->sync(
            $request->tags ?? []
        );


        $resource->audiences()->sync(
            $request->audiences ?? []
        );


        return redirect()
            ->route('admin.teaching-library.resources.index')
            ->with('success', 'Resource updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();


        return redirect()
            ->route('admin.teaching-library.resources.index')
            ->with('success', 'Resource deleted successfully.');
    }
}
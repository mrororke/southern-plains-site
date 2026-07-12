<?php

namespace App\Http\Controllers\Admin\TeachingLibrary;

use App\Models\Trick;

use App\Models\TeachingLibrary\Resource;
use App\Models\TeachingLibrary\ResourceCategory;
use App\Models\TeachingLibrary\ResourceTag;
use App\Models\TeachingLibrary\ResourceAudience;

use App\Http\Requests\TeachingLibrary\StoreResourceRequest;
use App\Http\Requests\TeachingLibrary\UpdateResourceRequest;

use App\Http\Controllers\Controller;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = Resource::with('category')
        ->latest()
        ->paginate(25);

        return view (
            'admin.teaching-library.resources.index',
            compact('resources')
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
        $tricks = Trick::orderBy('name')->get();

        return view (
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
        $resource = Resource::create($request->validated());

        $resource->tricks()->sync($request->tricks ?? []);
        $resource->tags()->sync($request->tags ?? []);
        $resource->audiences()->sync($request->audiences ?? []);

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
            'tricks',
            'author',
            'updatedBy',
        ]);

        return view (
            'admin.teaching-library.resources.show',
            compact('resource')
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
        $tricks = Trick::orderBy('name')->get();

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
        $resource->update($request->validated());
        $resource->tricks()->sync($request->tricks ?? []);
        $resource->tags()->sync($request->tags ?? []);
        $resource->audiences()->sync($request->audiences ?? []);

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

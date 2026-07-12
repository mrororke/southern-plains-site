<?php

namespace App\Http\Controllers\Admin\TeachingLibrary;

use App\Models\TeachingLibrary\Resource;
use App\Models\TeachingLibrary\ResourceCategory;

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

        return view (
            'admin.teaching-library.resources.create',
            compact('categories')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourceRequest $request)
    {
        Resource::create($request->validated());

        return redirect()
        ->route('admin.teaching-library.resources.index')
        ->with('success', 'Resource created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        $categories = ResourceCategory::orderBy('name')->get();

        return view(
            'admin.teaching-library.resources.edit',
            compact('resource', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResourceRequest $request, Resource $resource)
    {
        $resource->update($request->validated());

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

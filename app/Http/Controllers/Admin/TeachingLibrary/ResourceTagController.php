<?php

namespace App\Http\Controllers\Admin\TeachingLibrary;

use App\Models\TeachingLibrary\ResourceTag;

use App\Http\Requests\TeachingLibrary\StoreResourceTagRequest;
use App\Http\Requests\TeachingLibrary\UpdateResourceTagRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourceTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ResourceTag::orderBy('name')->get();

        return view('admin.teaching-library.tags.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teaching-library.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourceTagRequest $request)
    {
        ResourceTag::create($request->validated());

        return redirect()->route('admin.teaching-library.tags.index')->with('success', 'Tag created successfully.');
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
    public function edit(ResourceTag $Tag)
    {
        return view('admin.teaching-library.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResourceTagRequest $request, ResourceTag $Tag)
    {
        $Tag->update($request->validated());

        return redirect ()->route('admin.teaching-library.tags.index')->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResourceTag $Tag)
    {
        // TODO:  Prevent deleting categories currently in use
        // Resource relationship will be added once Resources exist.
        // For now, allow deletion

        $Tag->delete();

        return redirect()->route('admin.teaching-library.tags.index')->with('success', 'Tag deleted successfully.');
    }
}

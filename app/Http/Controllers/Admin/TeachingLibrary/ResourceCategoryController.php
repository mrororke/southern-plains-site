<?php

namespace App\Http\Controllers\Admin\TeachingLibrary;

use App\Models\TeachingLibrary\ResourceCategory;

use App\Http\Requests\TeachingLibrary\StoreResourceCategoryRequest;
use App\Http\Requests\TeachingLibrary\UpdateResourceCategoryRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ResourceCategory::orderBy('name')->get();

        return view('admin.teaching-library.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teaching-library.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourceCategoryRequest $request)
    {
        ResourceCategory::create($request->validated());

        return redirect()->route('teaching-library.categories.index')->with('success', 'Category created successfully.');
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
    public function edit(ResourceCategory $category)
    {
        return view('admin.teaching-library.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResourceCategoryRequest $request, ResourceCategory $category)
    {
        $category->update($request->validated());

        return redirect ()->route('teaching-library.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResourceCategory $category)
    {
        // TODO:  Prevent deleting categories currently in use
        // Resource relationship will be added once Resources exist.
        // For now, allow deletion

        $category->delete();

        return redirect()->route('teaching-library.categories.index')->with('success', 'Category deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin\TeachingLibrary;

use App\Models\TeachingLibrary\ResourceAudience;

use App\Http\Requests\TeachingLibrary\StoreResourceAudienceRequest;
use App\Http\Requests\TeachingLibrary\UpdateResourceAudienceRequest;

use App\Http\Controllers\Controller;

class ResourceAudienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $audiences = ResourceAudience::orderBy('name')->get();

        return view('admin.teaching-library.audiences.index', compact('audiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teaching-library.audiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourceAudienceRequest $request)
    {
        ResourceAudience::create($request->validated());

        return redirect()->route('admin.teaching-library.audiences.index')->with('success', 'Audience created successfully.');
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
    public function edit(ResourceAudience $audience)
    {
        return view('admin.teaching-library.audiences.edit', compact('audience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResourceAudienceRequest $request, ResourceAudience $audience)
    {
        $audience->update($request->validated());

        return redirect ()->route('admin.teaching-library.audiences.index')->with('success', 'Audience updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResourceAudience $audience)
    {
        // TODO:  Prevent deleting audiences currently in use
        // Resource relationship will be added once Resources exist.
        // For now, allow deletion

        $audience->delete();

        return redirect()->route('admin.teaching-library.audiences.index')->with('success', 'Audience deleted successfully.');
    }
}

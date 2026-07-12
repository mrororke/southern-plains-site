<?php

namespace App\Http\Controllers\Admin\TeachingLibrary;

use App\Models\TeachingLibrary\Resource;
use App\Models\TeachingLibrary\ResourceCategory;

use App\Http\Requests\TeachingLibrary\StoreResourceRequest;
use App\Http\Requests\TeachingLibrary\UpdateResourceRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

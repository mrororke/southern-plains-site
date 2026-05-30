<?php

namespace App\Http\Controllers;

use App\Models\Rat;
use App\Models\RatBreeder;
use Illuminate\Http\Request;

class RatController extends Controller
{
    public function create()
    {
        return view('rats.create', [
            'breeders' => RatBreeder::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'registered_name' => 'nullable|string|max:255',
            'breeder_reference' => 'nullable|string|max:10',
            'sex' => 'required|in:Male,Female',
            'dob' => 'nullable|date',
            'dod' => 'nullable|date',
            'variety' => 'required',
            'color' => 'required',
            'silvered' => 'nullable',
            'markings' => 'required',
            'eye_color' => 'required',
            'ear_set' => 'required',
            'breeder_id' => 'nullable|exists:rat_breeders,id',
            'is_owned' => 'boolean',
            'is_pedigree_only' => 'boolean',
        ]);

        $validated['is_owned'] = $request->has('is_owned');
        $validated['is_pedigree_only'] = $request->has('is_pedigree_only');

        Rat::create($validated);

        return redirect('/rats/create')->with('success', 'Rat created successfully.');
    }
}
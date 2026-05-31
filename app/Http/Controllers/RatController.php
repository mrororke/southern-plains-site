<?php

namespace App\Http\Controllers;

use App\Models\Rat;
use App\Models\RatBreeder;
use Illuminate\Http\Request;

class RatController extends Controller
{
    public function index()
    {
        $rats = Rat::with('breeder')->latest()->paginate(20);

        return view('admin.rats.index', compact('rats'));
    }

    public function create()
    {
        return view('admin.rats.create', [
            'breeders' => RatBreeder::all(),
            'sexes' => Rat::sexes(),
            'varieties' => Rat::varieties(),
            'colors' => Rat::colors(),
            'silveredOptions' => Rat::silvered(),
            'markings' => Rat::markings(),
            'eyeColors' => Rat::eyeColors(),
            'earSets' => Rat::earSets(),
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

            'variety' => 'required|string',
            'silvered' => 'nullable|string',
            'eye_color' => 'required|string',
            'ear_set' => 'required|string',

            'breeder_id' => 'nullable|exists:rat_breeders,id',

            'colors' => 'required|array',
            'colors.*' => 'exists:rat_colors,id',

            'markings' => 'required|array',
            'markings.*' => 'exists:rat_markings,id',
        ]);

        $rat = Rat::create([
            ...$validated,
            'is_owned' => $request->boolean('is_owned'),
            'is_pedigree_only' => $request->boolean('is_pedigree_only'),
        ]);

        $rat->colors()->sync($request->colors);
        $rat->markings()->sync($request->markings);

        return redirect()
            ->route('admin.rats.index')
            ->with('success', 'Rat created successfully.');
    }

    public function edit(Rat $rat)
    {
        return view('admin.rats.edit', [
            'rat' => $rat,
            'breeders' => RatBreeder::all(),
            'sexes' => Rat::sexes(),
            'varieties' => Rat::varieties(),
            'colors' => Rat::colors(),
            'silveredOptions' => Rat::silvered(),
            'markings' => Rat::markings(),
            'eyeColors' => Rat::eyeColors(),
            'earSets' => Rat::earSets(),
        ]);
    }

    public function update(Request $request, Rat $rat)
{
    $validated = $request->validate([
        'name' => 'required|string|max:150',
        'registered_name' => 'nullable|string|max:255',
        'breeder_reference' => 'nullable|string|max:10',

        'sex' => 'required|in:Male,Female',
        'dob' => 'nullable|date',
        'dod' => 'nullable|date',

        'variety' => 'required|string',
        'silvered' => 'nullable|string',
        'eye_color' => 'required|string',
        'ear_set' => 'required|string',

        'breeder_id' => 'nullable|exists:rat_breeders,id',

        'colors' => 'required|array',
        'colors.*' => 'exists:rat_colors,id',

        'markings' => 'required|array',
        'markings.*' => 'exists:rat_markings,id',
    ]);

    $ratData = collect($validated)
        ->except(['colors', 'markings'])
        ->toArray();

    $rat->update([
        ...$ratData,
        'is_owned' => $request->boolean('is_owned'),
        'is_pedigree_only' => $request->boolean('is_pedigree_only'),
    ]);

    $rat->colors()->sync($request->colors);
    $rat->markings()->sync($request->markings);

    return redirect()
        ->route('admin.rats.index')
        ->with('success', 'Rat updated successfully.');
}

    public function show(Rat $rat)
    {
        $rat->load([
            'breeder',
            'weights',
            'healthRecords',
            'temperamentAssessments',
            'littersAsSire',
            'littersAsDam'
        ]);

        return view('admin.rats.show', compact('rat'));
    }

    public function destroy(Rat $rat)
    {
        $rat->delete();

        return redirect()
            ->route('admin.rats.index')
            ->with('success', 'Rat deleted successfully.');
    }
}

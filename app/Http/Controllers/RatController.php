<?php

namespace App\Http\Controllers;

use App\Models\Rat;
use App\Models\RatBreeder;
use App\Models\RatColor;
use App\Models\RatMarking;

use Illuminate\Http\Request;


class RatController extends Controller
{
    public function index()
    {
        $rats = Rat::with(['breeder', 'colors'])->orderBy('name')->paginate(20);

        return view('admin.rats.index', compact('rats'));
    }

    public function create()
{
    return view('admin.rats.create', [
        'breeders' => RatBreeder::all(),

        'sires' => Rat::where('sex', 'Male')
            ->orderBy('name')
            ->get(),

        'dams' => Rat::where('sex', 'Female')
            ->orderBy('name')
            ->get(),

        'sexes' => Rat::sexes(),
        'varieties' => Rat::varieties(),
        'colors' => RatColor::all(),
        'silvered' => Rat::silveredOptions(),
        'markings' => RatMarking::all(),
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

            'sire_id' => 'nullable|exists:rats,id',
            'dam_id' => 'nullable|exists:rats,id',

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
            'name' => $validated['name'],
            'registered_name' => $validated['registered_name'] ?? null,
            'breeder_reference' => $validated['breeder_reference'] ?? null,

            'sire_id' => $validated['sire_id'] ?? null,
            'dam_id' => $validated['dam_id'] ?? null,

            'sex' => $validated['sex'],
            'dob' => $validated['dob'] ?? null,
            'dod' => $validated['dod'] ?? null,

            'variety' => $validated['variety'],
            'silvered' => $validated['silvered'] ?? null,
            'eye_color' => $validated['eye_color'],
            'ear_set' => $validated['ear_set'],

            'breeder_id' => $validated['breeder_id'] ?? null,

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
            'sires' => Rat::where('sex', 'Male')
                ->where('id', '!=', $rat->id)
                ->orderBy('name')
                ->get(),

            'dams' => Rat::where('sex', 'Female')
                ->where('id', '!=', $rat->id)
                ->orderBy('name')
                ->get(),
            'sexes' => Rat::sexes(),
            'varieties' => Rat::varieties(),
            'colors' => RatColor::all(),
            'silvered' => Rat::silveredOptions(),
            'markings' => RatMarking::all(),
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

    'sire_id' => 'nullable|exists:rats,id',
    'dam_id' => 'nullable|exists:rats,id',

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
        'sire.sire.sire',
        'sire.sire.dam',
        'sire.dam.sire',
        'sire.dam.dam',
        'dam.sire.sire',
        'dam.sire.dam',
        'dam.dam.sire',
        'dam.dam.dam',
        'weights',
        'healthRecords',
        'temperamentAssessments',
        'littersAsSire',
        'littersAsDam'
    ]);

    $mode = $rat->getViewMode();

    return view('admin.rats.show', compact('rat', 'mode'));
}

    public function destroy(Rat $rat)
    {
        $rat->delete();

        return redirect()
            ->route('admin.rats.index')
            ->with('success', 'Rat deleted successfully.');
    }
}

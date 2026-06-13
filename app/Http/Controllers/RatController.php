<?php

namespace App\Http\Controllers;

use App\Models\Rat;
use App\Models\RatBreeder;
use App\Models\RatColor;
use App\Models\RatMarking;

use App\Http\Requests\Rats\StoreRatRequest;
use App\Http\Requests\Rats\UpdateRatRequest;

use App\Services\Rats\RatQueryService;
use App\Services\Rats\RatStatsService;
use App\Services\Rats\RatPedigreeService;

class RatController extends Controller
{
    public function index(
        RatQueryService $queryService,
        RatStatsService $statsService,
        RatPedigreeService $pedigreeService
    ) {
        $rats = $queryService->index(request()->all());

        return view('admin.rats.index', array_merge(
            compact('rats'),
            $statsService->get(),
            ['maxDepth' => $pedigreeService->maxDepth()],
            [
                'breeders' => RatBreeder::orderBy('rattery')->get(),
            ]
        ));
    }

    public function create()
    {
        return view('admin.rats.create', [
            'breeders' => RatBreeder::all(),
            'sires' => Rat::where('sex', 'Male')->orderBy('name')->get(),
            'dams' => Rat::where('sex', 'Female')->orderBy('name')->get(),
            'sexes' => Rat::sexes(),
            'varieties' => Rat::varieties(),
            'colors' => RatColor::all(),
            'silvered' => Rat::silveredOptions(),
            'markings' => RatMarking::all(),
            'eyeColors' => Rat::eyeColors(),
            'earSets' => Rat::earSets(),
        ]);
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

    public function store(StoreRatRequest $request)
    {
        $rat = Rat::create([
            ...$request->validated(),
            'is_owned' => $request->boolean('is_owned'),
            'is_pedigree_only' => $request->boolean('is_pedigree_only'),
        ]);

        $rat->colors()->sync($request->colors);
        $rat->markings()->sync($request->markings);

        return redirect()
            ->route('admin.rats.index')
            ->with('success', 'Rat created successfully.');
    }

    public function update(UpdateRatRequest $request, Rat $rat)
    {
        $rat->update([
            ...collect($request->validated())->except(['colors', 'markings'])->toArray(),
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

        return view('admin.rats.show', [
            'rat' => $rat,
            'mode' => $rat->getViewMode()
        ]);
    }

    public function destroy(Rat $rat)
    {
        $rat->delete();

        return redirect()
            ->route('admin.rats.index')
            ->with('success', 'Rat deleted successfully.');
    }
}
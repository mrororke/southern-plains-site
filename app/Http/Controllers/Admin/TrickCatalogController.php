<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trick;
use App\Models\TrickLevel;
use App\Models\TrickVideo;
use App\Services\TrickVideoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrickCatalogController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $tricks = Trick::query()
            ->with(['videos', 'levels'])
            ->orderByRaw('LOWER(name) asc')
            ->paginate(25);

        return view('admin.trick-catalog.index', compact('tricks'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $levels = TrickLevel::orderBy('name')->get();

        return view('admin.trick-catalog.create', compact('levels'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'levels' => 'nullable|array',
            'levels.*' => 'exists:trick_levels,id',
            'notes' => 'nullable|string',
            'videos' => 'nullable|array',
        ]);

        DB::transaction(function () use ($validated, $request) {

            $trick = Trick::create([
                'name' => $validated['name'],
                'notes' => $validated['notes'] ?? null,
                'created_by' => auth()->id(),
            ]);

            // levels (MANY-TO-MANY)
            $trick->levels()->sync($validated['levels'] ?? []);

            // videos
            foreach ($request->videos ?? [] as $video) {

                if (empty($video['url'])) {
                    continue;
                }

                $url = TrickVideoService::normalizeUrl($video['url']);

                $exists = TrickVideo::where('trick_id', $trick->id)
                    ->where('url', $url)
                    ->exists();

                if ($exists) {
                    continue;
                }

                TrickVideo::create([
                    'trick_id' => $trick->id,
                    'url' => $url,
                    'platform' => $video['platform'] ?? 'unknown',
                    'creator' => $video['creator'] ?? null,
                    'is_preferred' => !empty($video['is_preferred']),
                    'created_by' => auth()->id(),
                ]);
            }
        });

        return redirect()
            ->route('admin.trick-catalog.index')
            ->with('success', 'Trick created.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit(Trick $trick_catalog)
    {
        $levels = TrickLevel::orderBy('name')->get();

        return view('admin.trick-catalog.edit', [
            'trick' => $trick_catalog->load(['videos', 'levels']),
            'levels' => $levels,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Trick $trick_catalog)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'levels' => 'nullable|array',
            'levels.*' => 'exists:trick_levels,id',
            'notes' => 'nullable|string',
            'videos' => 'nullable|array',

            'videos.*.id' => 'nullable|exists:trick_videos,id',
            'videos.*.url' => 'nullable|string',
            'videos.*.platform' => 'nullable|string',
            'videos.*.creator' => 'nullable|string',
            'videos.*.is_preferred' => 'nullable',
        ]);

        DB::transaction(function () use ($validated, $request, $trick_catalog) {

            /*
            |--------------------------------------------------------------------------
            | Update trick core fields
            |--------------------------------------------------------------------------
            */
            $trick_catalog->update([
                'name' => $validated['name'],
                'notes' => $validated['notes'] ?? null,
                'updated_by' => auth()->id(),
            ]);

            /*
            |--------------------------------------------------------------------------
            | Sync levels (THIS IS THE IMPORTANT FIX)
            |--------------------------------------------------------------------------
            */
            $trick_catalog->levels()->sync($validated['levels'] ?? []);

            /*
            |--------------------------------------------------------------------------
            | Videos
            |--------------------------------------------------------------------------
            */
            $submittedVideoIds = [];

            foreach ($request->videos ?? [] as $video) {

                if (empty($video['url'])) {
                    continue;
                }

                $url = TrickVideoService::normalizeUrl($video['url']);

                // UPDATE existing
                if (!empty($video['id'])) {

                    $record = TrickVideo::find($video['id']);

                    if ($record) {
                        $record->update([
                            'url' => $url,
                            'platform' => $video['platform'] ?? 'unknown',
                            'creator' => $video['creator'] ?? null,
                            'is_preferred' => !empty($video['is_preferred']),
                            'updated_by' => auth()->id(),
                        ]);

                        $submittedVideoIds[] = $record->id;
                    }
                }

                // CREATE new
                else {

                    $duplicate = TrickVideo::where('trick_id', $trick_catalog->id)
                        ->where('url', $url)
                        ->exists();

                    if ($duplicate) {
                        continue;
                    }

                    $new = TrickVideo::create([
                        'trick_id' => $trick_catalog->id,
                        'url' => $url,
                        'platform' => $video['platform'] ?? 'unknown',
                        'creator' => $video['creator'] ?? null,
                        'is_preferred' => !empty($video['is_preferred']),
                        'created_by' => auth()->id(),
                    ]);

                    $submittedVideoIds[] = $new->id;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Delete removed videos
            |--------------------------------------------------------------------------
            */
            TrickVideo::where('trick_id', $trick_catalog->id)
                ->whereNotIn('id', $submittedVideoIds)
                ->delete();
        });

        return redirect()
            ->route('admin.trick-catalog.index')
            ->with('success', 'Trick updated.');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(Trick $trick_catalog)
    {
        $trick_catalog->videos()->delete();
        $trick_catalog->levels()->detach();
        $trick_catalog->delete();

        return redirect()
            ->route('admin.trick-catalog.index')
            ->with('success', 'Trick deleted.');
    }

    /*
    |--------------------------------------------------------------------------
    | MODAL DATA
    |--------------------------------------------------------------------------
    */
    public function showData(Trick $trick_catalog)
    {
        return response()->json([
            'id' => $trick_catalog->id,
            'name' => $trick_catalog->name,
            'notes' => $trick_catalog->notes,

            'levels' => $trick_catalog->levels()->get(),

            'videos' => $trick_catalog->videos()
                ->get(['id', 'url', 'platform', 'creator', 'is_preferred']),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | VIDEO CHECK
    |--------------------------------------------------------------------------
    */
    public function checkVideo(Request $request)
    {
        $url = TrickVideoService::normalizeUrl($request->url);

        $exists = TrickVideo::where('url', $url)->first();

        return response()->json([
            'exists' => (bool) $exists,
            'trick' => $exists?->trick?->name,
            'platform' => TrickVideoService::detectPlatform($url),
        ]);
    }
}
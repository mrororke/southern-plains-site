<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trick;
use App\Models\TrickVideo;
use App\Services\TrickVideoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrickCatalogController extends Controller
{
    public function index()
    {
        $tricks = Trick::query()
            ->with(['videos'])
            ->orderByRaw('LOWER(name) asc')
            ->paginate(25);

        return view('admin.trick-catalog.index', compact('tricks'));
    }

    public function create()
    {
        return view('admin.trick-catalog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'level' => 'required|in:novice,intermediate,advanced,performer,performer_elite',
            'notes' => 'nullable|string',
            'videos' => 'array',
        ]);

        $trick = Trick::create([
            'name' => $validated['name'],
            'level' => $validated['level'],
            'notes' => $validated['notes'] ?? null,
            'created_by' => auth()->id(),
        ]);

        foreach ($request->videos ?? [] as $video) {

        if (empty($video['url'])) continue;

        $url = TrickVideoService::normalizeUrl($video['url']);

        // duplicate prevention per trick
        $exists = TrickVideo::where('trick_id', $trick->id)
            ->where('url', $url)
            ->exists();

        if ($exists) continue;

        TrickVideo::create([
            'trick_id' => $trick->id,
            'url' => $url,
            'platform' => $video['platform'] ?? 'unknown',
            'creator' => $video['creator'] ?? null,
            'is_preferred' => !empty($video['is_preferred']),
            'created_by' => auth()->id(),
        ]);
    }

    return redirect()->route('admin.trick-catalog.index');
    }

    public function update(Request $request, Trick $trick_catalog)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'level' => 'required|in:novice,intermediate,advanced,performer,performer_elite',
        'notes' => 'nullable|string',

        'videos' => 'array',

        'videos.*.id' => 'nullable|exists:trick_videos,id',
        'videos.*.url' => 'nullable|string',
        'videos.*.platform' => 'nullable|string',
        'videos.*.creator' => 'nullable|string',
        'videos.*.is_preferred' => 'nullable',
    ]);


    DB::transaction(function () use ($request, $trick_catalog) {


        /*
        |--------------------------------------------------------------------------
        | Update Trick
        |--------------------------------------------------------------------------
        */

        $trick_catalog->update([

            'name' => $request->name,

            'level' => $request->level,

            'notes' => $request->notes,

            'updated_by' => auth()->id(),

        ]);



        /*
        |--------------------------------------------------------------------------
        | Track submitted video IDs
        |--------------------------------------------------------------------------
        */

        $submittedVideoIds = [];



        /*
        |--------------------------------------------------------------------------
        | Update / Create Videos
        |--------------------------------------------------------------------------
        */

        foreach ($request->videos ?? [] as $video) {


            if (empty($video['url'])) {
                continue;
            }


            $url = TrickVideoService::normalizeUrl($video['url']);



            /*
            Existing video
            */

            if (!empty($video['id'])) {


                $record = TrickVideo::find($video['id']);


                if ($record) {

                    $record->update([

                        'url' => $url,

                        'platform' => $video['platform'] ?? 'unknown',

                        'creator' => $video['creator'] ?? null,

                        'is_preferred' =>
                            !empty($video['is_preferred']),

                        'updated_by' => auth()->id(),

                    ]);


                    $submittedVideoIds[] = $record->id;

                }


            }


            /*
            New video
            */

            else {


                $duplicate = TrickVideo::where('trick_id', $trick_catalog->id)
                    ->where('url', $url)
                    ->exists();


                if ($duplicate) {
                    continue;
                }



                $newVideo = TrickVideo::create([

                    'trick_id' => $trick_catalog->id,

                    'url' => $url,

                    'platform' =>
                        $video['platform'] ?? 'unknown',

                    'creator' =>
                        $video['creator'] ?? null,

                    'is_preferred' =>
                        !empty($video['is_preferred']),

                    'created_by' => auth()->id(),

                ]);


                $submittedVideoIds[] = $newVideo->id;

            }

        }




        /*
        |--------------------------------------------------------------------------
        | Remove deleted videos
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

    public function edit(Trick $trick_catalog){
        $trick_catalog->load('videos');
        return view(
            'admin.trick-catalog.edit', ['trick' => $trick_catalog]
        );
    }

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

public function destroy(Trick $trick_catalog)
{
    $trick_catalog->load('videos');

    // delete related videos first (safe explicit control)
    $trick_catalog->videos()->delete();

    // delete trick
    $trick_catalog->delete();

    return redirect()
        ->route('admin.trick-catalog.index')
        ->with('success', 'Trick deleted.');
}

public function showData(Trick $trick_catalog)
{
    return response()->json([
        'name' => $trick_catalog->name,
        'level' => $trick_catalog->level,
        'notes' => $trick_catalog->notes,
        'videos' => $trick_catalog->videos()->get([
            'url',
            'platform',
            'creator'
        ]),
    ]);
}
}

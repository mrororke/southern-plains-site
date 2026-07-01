<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trick;
use App\Models\TrickVideo;
use App\Services\TrickVideoService;
use Illuminate\Http\Request;

class TrickCatalogController extends Controller
{
    public function index()
    {
        $tricks = Trick::query()
            ->with(['videos'])
            ->latest()
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

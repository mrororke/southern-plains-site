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

    public function index(Request $request)
    {
        $levels = TrickLevel::orderByRaw('LOWER(name)')->get();

        $query = Trick::query()
            ->with(['videos', 'levels']);

        // Search
        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('notes', 'like', "%{$search}%")
                    ->orWhereHas('videos', function ($video) use ($search) {

                        $video->where('creator', 'like', "%{$search}%");
                    });
            });
        }

        // Level Filter
        if ($request->filled('level')) {

            if ($request->level === 'none') {

                $query->doesntHave('levels');
            } else {

                $query->whereHas('levels', function ($q) use ($request) {
                    $q->where('trick_levels.id', $request->level);
                });
            }
        }

        // Platform Filter
        if ($request->filled('platform')) {

            $query->whereHas('videos', function ($q) use ($request) {

                $q->where('platform', $request->platform);
            });
        }

        // Preferred Video Filter
        if ($request->preferred === 'yes') {

            $query->whereHas('videos', function ($q) {

                $q->where('is_preferred', true);
            });
        } elseif ($request->preferred === 'no') {

            $query->whereDoesntHave('videos', function ($q) {

                $q->where('is_preferred', true);
            });
        }

        // Notes Filter
        if ($request->notes === 'has') {

            $query->whereNotNull('notes')
                ->where('notes', '!=', '');
        } elseif ($request->notes === 'missing') {

            $query->where(function ($q) {

                $q->whereNull('notes')
                    ->orWhere('notes', '');
            });
        }

        // Sorting
        switch ($request->sort) {

            case 'name_desc':
                $query->orderByRaw('LOWER(name) DESC');
                break;

            case 'newest':
                $query->latest();
                break;

            case 'oldest':
                $query->oldest();
                break;

            case 'videos':
                $query->withCount('videos')
                    ->orderByDesc('videos_count');
                break;

            default:
                $query->orderByRaw('LOWER(name) ASC');
                break;
        }

        $tricks = $query
            ->paginate(25)
            ->withQueryString();

        return view('admin.trick-catalog.index', [
            'tricks' => $tricks,
            'levels' => $levels,
        ]);
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
        $user = auth()->user();

        $isInstructor = $user->roles()->where('slug', 'instructor')->exists();

        // Admin OR Instructor allowed
        if (!$user->isAdmin() && !$isInstructor) {
            abort(403, 'Unauthorized');
        }

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
    /*
    |--------------------------------------------------------------------------
    | PRINTABLE
    |--------------------------------------------------------------------------
    */

    public function printAll()
    {
        $tricks = \App\Models\Trick::with(['levels', 'videos'])
            ->orderBy('name')
            ->get();

        return view('admin.trick-catalog.print-all', [
            'tricks' => $tricks,
        ]);
    }

    /*
|--------------------------------------------------------------------------
| BEHAVIOR CATALOG - DASHBOARD V2
|--------------------------------------------------------------------------
*/

public function behaviorCatalog(Request $request)
{
    $levels = TrickLevel::orderByRaw('LOWER(name)')
        ->get();

    $query = Trick::query()
        ->with([
            'videos',
            'levels',
        ]);

    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

    if ($request->filled('search')) {
        $search = trim($request->search);

        $query->where(function ($q) use ($search) {
            $q->where(
                'name',
                'like',
                "%{$search}%"
            )
                ->orWhere(
                    'notes',
                    'like',
                    "%{$search}%"
                )
                ->orWhereHas(
                    'videos',
                    function ($video) use ($search) {
                        $video->where(
                            'creator',
                            'like',
                            "%{$search}%"
                        );
                    }
                );
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Level Filter
    |--------------------------------------------------------------------------
    */

    if ($request->filled('level')) {

        if ($request->level === 'none') {

            $query->doesntHave('levels');

        } else {

            $query->whereHas(
                'levels',
                function ($q) use ($request) {
                    $q->where(
                        'trick_levels.id',
                        $request->level
                    );
                }
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Platform Filter
    |--------------------------------------------------------------------------
    */

    if ($request->filled('platform')) {

        $query->whereHas(
            'videos',
            function ($q) use ($request) {
                $q->where(
                    'platform',
                    $request->platform
                );
            }
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Preferred Video Filter
    |--------------------------------------------------------------------------
    */

    if ($request->preferred === 'yes') {

        $query->whereHas(
            'videos',
            function ($q) {
                $q->where(
                    'is_preferred',
                    true
                );
            }
        );

    } elseif ($request->preferred === 'no') {

        $query->whereDoesntHave(
            'videos',
            function ($q) {
                $q->where(
                    'is_preferred',
                    true
                );
            }
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Notes Filter
    |--------------------------------------------------------------------------
    */

    if ($request->notes === 'has') {

        $query
            ->whereNotNull('notes')
            ->where('notes', '!=', '');

    } elseif ($request->notes === 'missing') {

        $query->where(function ($q) {
            $q->whereNull('notes')
                ->orWhere('notes', '');
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Sorting
    |--------------------------------------------------------------------------
    */

    switch ($request->sort) {

        case 'name_desc':
            $query->orderByRaw(
                'LOWER(name) DESC'
            );
            break;

        case 'newest':
            $query->latest();
            break;

        case 'oldest':
            $query->oldest();
            break;

        case 'videos':
            $query
                ->withCount('videos')
                ->orderByDesc('videos_count');
            break;

        default:
            $query->orderByRaw(
                'LOWER(name) ASC'
            );
            break;
    }

    /*
    |--------------------------------------------------------------------------
    | Device-Specific Pagination
    |--------------------------------------------------------------------------
    */

    $isMobile = request()
        ->attributes
        ->get('isMobile', false);

    $perPage = $isMobile
        ? 15
        : 25;

    /*
    |--------------------------------------------------------------------------
    | Deep Link To Behavior
    |--------------------------------------------------------------------------
    */

    if ($request->filled('behavior')) {

        $behaviorId = (int) $request->behavior;

        $position = (clone $query)
            ->pluck('id')
            ->search($behaviorId);

        if ($position !== false) {

            $page = (int) floor(
                $position / $perPage
            ) + 1;

            if ((int) $request->page !== $page) {

                return redirect()->to(
                    $request->fullUrlWithQuery([
                        'page' => $page,
                    ])
                );
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Load Catalog
    |--------------------------------------------------------------------------
    */

    $tricks = $query
        ->with([
            'levels',
            'videos',

            'resources' => function ($resourceQuery) {
                $resourceQuery
                    ->where(
                        'status',
                        'active'
                    )
                    ->with([
                        'type',
                        'series',
                    ]);
            },
        ])
        ->withCount('videos')
        ->paginate($perPage)
        ->withQueryString();

    return view(
        $isMobile
            ? 'admin.dashboard-v2.mobile.behavior-catalog.index'
            : 'admin.dashboard-v2.behavior-catalog.index',
        [
            'navigation' =>
                \App\Navigation\AdminNavigation::items(),

            'tricks' => $tricks,

            'levels' => $levels,
        ]
    );
}
    

    /*
|--------------------------------------------------------------------------
| BEHAVIOR DISPLAY - DASHBOARD V2 MOBILE
|--------------------------------------------------------------------------
*/

public function behaviorShow(Trick $trick)
{
    $trick->load([
        'levels',
        'videos',
        'preferredVideo',
        'creator',
        'updater',

        'resources' => function ($query) {
            $query
                ->where('status', 'active')
                ->with([
                    'category',
                    'type',
                    'series',
                ])
                ->orderByRaw(
                    'CASE
                        WHEN first_sent IS NULL THEN 1
                        ELSE 0
                    END'
                )
                ->orderByDesc('first_sent')
                ->orderByDesc('resources.created_at');
        },
    ]);

    return view(
        'admin.dashboard-v2.mobile.behavior-catalog.show',
        [
            'navigation' => \App\Navigation\AdminNavigation::items(),
            'behavior' => $trick,
        ]
    );
}

    /*
    |--------------------------------------------------------------------------
    | BEHAVIOR CREATE - DASHBOARD V2
    |--------------------------------------------------------------------------
    */

    public function behaviorCreate()
    {
        $levels = TrickLevel::orderByRaw('LOWER(name)')->get();

        return view(
            'admin.dashboard-v2.behavior-catalog.create',
            [
                'navigation' => \App\Navigation\AdminNavigation::items(),
                'levels' => $levels,
            ]
        );
    }

    /*
|--------------------------------------------------------------------------
| BEHAVIOR EDIT - DASHBOARD V2
|--------------------------------------------------------------------------
*/

    public function behaviorEdit(Trick $trick)
    {
        $levels = TrickLevel::orderByRaw('LOWER(name)')->get();

        $trick->load([
            'levels',
            'videos',
        ]);

        return view(
            'admin.dashboard-v2.behavior-catalog.edit',
            [
                'navigation' => \App\Navigation\AdminNavigation::items(),
                'trick' => $trick,
                'levels' => $levels,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | BEHAVIOR STORE - DASHBOARD V2
    |--------------------------------------------------------------------------
    */

    public function behaviorStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'levels' => 'nullable|array',
            'levels.*' => 'exists:trick_levels,id',
            'notes' => 'nullable|string',
            'videos' => 'nullable|array',

            'videos.*.url' => 'nullable|url',
            'videos.*.platform' => 'nullable|string',
            'videos.*.creator' => 'nullable|string',
            'videos.*.is_preferred' => 'nullable',
        ]);

        DB::transaction(function () use ($validated, $request) {
            $behavior = Trick::create([
                'name' => $validated['name'],
                'notes' => $validated['notes'] ?? null,
                'created_by' => auth()->id(),
            ]);

            $behavior->levels()->sync(
                $validated['levels'] ?? []
            );

            foreach ($request->videos ?? [] as $video) {
                if (empty($video['url'])) {
                    continue;
                }

                $url = TrickVideoService::normalizeUrl(
                    $video['url']
                );

                $exists = TrickVideo::where(
                    'trick_id',
                    $behavior->id
                )
                    ->where('url', $url)
                    ->exists();

                if ($exists) {
                    continue;
                }

                TrickVideo::create([
                    'trick_id' => $behavior->id,
                    'url' => $url,
                    'platform' => $video['platform'] ?? 'unknown',
                    'creator' => $video['creator'] ?? null,
                    'is_preferred' => ! empty($video['is_preferred']),
                    'created_by' => auth()->id(),
                ]);
            }
        });

        return redirect()
            ->route('admin.behavior-catalog.index')
            ->with('success', 'Behavior created.');
    }

    /*
|--------------------------------------------------------------------------
| BEHAVIOR DELETE - DASHBOARD V2
|--------------------------------------------------------------------------
*/

    public function behaviorDestroy(Trick $trick)
    {
        $user = auth()->user();

        $isInstructor = $user->roles()
            ->where('slug', 'instructor')
            ->exists();

        if (! $user->isAdmin() && ! $isInstructor) {
            abort(403, 'Unauthorized');
        }

        DB::transaction(function () use ($trick) {
            $trick->videos()->delete();
            $trick->levels()->detach();
            $trick->delete();
        });

        return redirect()
            ->route('admin.behavior-catalog.index')
            ->with('success', 'Behavior deleted.');
    }

    /*
|--------------------------------------------------------------------------
| BEHAVIOR UPDATE - DASHBOARD V2
|--------------------------------------------------------------------------
*/

public function behaviorUpdate(Request $request, Trick $trick)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'levels' => 'nullable|array',
        'levels.*' => 'exists:trick_levels,id',
        'notes' => 'nullable|string',
        'videos' => 'nullable|array',

        'videos.*.id' => 'nullable|exists:trick_videos,id',
        'videos.*.url' => 'nullable|url',
        'videos.*.platform' => 'nullable|string',
        'videos.*.creator' => 'nullable|string',
        'videos.*.is_preferred' => 'nullable',
    ]);

    DB::transaction(function () use ($validated, $request, $trick) {
        $trick->update([
            'name' => $validated['name'],
            'notes' => $validated['notes'] ?? null,
            'updated_by' => auth()->id(),
        ]);

        $trick->levels()->sync(
            $validated['levels'] ?? []
        );

        $submittedVideoIds = [];

        foreach ($request->videos ?? [] as $video) {
            if (empty($video['url'])) {
                continue;
            }

            $url = TrickVideoService::normalizeUrl(
                $video['url']
            );

            /*
            |--------------------------------------------------------------------------
            | Update Existing Video
            |--------------------------------------------------------------------------
            */

            if (! empty($video['id'])) {
                $record = TrickVideo::where(
                    'trick_id',
                    $trick->id
                )
                    ->where('id', $video['id'])
                    ->first();

                if (! $record) {
                    continue;
                }

                $record->update([
                    'url' => $url,
                    'platform' => $video['platform'] ?? 'unknown',
                    'creator' => $video['creator'] ?? null,
                    'is_preferred' => ! empty(
                        $video['is_preferred']
                    ),
                    'updated_by' => auth()->id(),
                ]);

                $submittedVideoIds[] = $record->id;

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Create New Video
            |--------------------------------------------------------------------------
            */

            $duplicate = TrickVideo::where(
                'trick_id',
                $trick->id
            )
                ->where('url', $url)
                ->exists();

            if ($duplicate) {
                continue;
            }

            $newVideo = TrickVideo::create([
                'trick_id' => $trick->id,
                'url' => $url,
                'platform' => $video['platform'] ?? 'unknown',
                'creator' => $video['creator'] ?? null,
                'is_preferred' => ! empty(
                    $video['is_preferred']
                ),
                'created_by' => auth()->id(),
            ]);

            $submittedVideoIds[] = $newVideo->id;
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Removed Videos
        |--------------------------------------------------------------------------
        */

        TrickVideo::where('trick_id', $trick->id)
            ->whereNotIn('id', $submittedVideoIds)
            ->delete();
    });

    return redirect()
        ->route('admin.behavior-catalog.index')
        ->with('success', 'Behavior updated.');
}
}

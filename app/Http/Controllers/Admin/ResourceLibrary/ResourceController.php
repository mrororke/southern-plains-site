<?php

namespace App\Http\Controllers\Admin\ResourceLibrary;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceLibrary\StoreResourceRequest;
use App\Http\Requests\ResourceLibrary\UpdateResourceRequest;
use App\Models\ResourceLibrary\Resource;
use App\Models\ResourceLibrary\ResourceCategory;
use App\Models\ResourceLibrary\ResourceSeries;
use App\Models\ResourceLibrary\ResourceType;
use App\Models\Trick;
use App\Services\ResourceLibrary\ResourceService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function __construct(
        protected ResourceService $resourceService
    ) {
    }

    /*
    |--------------------------------------------------------------------------
    | Index
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = $this->buildIndexQuery();

        $this->applySearch($query, $request);
        $this->applyFilters($query, $request);
        $this->applySorting($query, $request);

        $isMobile = request()
            ->attributes
            ->get('isMobile', false);

        $perPage = $isMobile ? 15 : 25;

        $resources = $query
            ->paginate($perPage)
            ->withQueryString();

        $categories = ResourceCategory::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $types = ResourceType::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            $isMobile
                ? 'admin.dashboard-v2.mobile.resource-library.index'
                : 'admin.dashboard-v2.resource-library.index',
            [
                'navigation' => \App\Navigation\AdminNavigation::items(),
                'resources' => $resources,
                'categories' => $categories,
                'types' => $types,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categories = ResourceCategory::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $types = ResourceType::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $series = ResourceSeries::query()
            ->with('category')
            ->orderBy('name')
            ->get();

        $tricks = Trick::query()
            ->with('levels')
            ->orderByRaw('LOWER(name)')
            ->get();

        $relatedResources = Resource::query()
            ->where('status', 'active')
            ->orderByRaw('LOWER(title)')
            ->get();

        return view(
            'admin.dashboard-v2.resource-library.create',
            [
                'navigation' => \App\Navigation\AdminNavigation::items(),
                'categories' => $categories,
                'types' => $types,
                'series' => $series,
                'tricks' => $tricks,
                'relatedResources' => $relatedResources,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(StoreResourceRequest $request)
    {
        $resource = $this->resourceService->store(
            $request->validated()
        );

        return redirect()
            ->route(
                'admin-v2.resource-library.index',
                ['resource' => $resource->id]
            )
            ->with('success', 'Resource created.');
    }

    /*
    |--------------------------------------------------------------------------
    | Show
    |--------------------------------------------------------------------------
    */

    public function show(Resource $resource)
    {
        $resource->load([
            'category',
            'type',
            'series',
            'basedOn',
            'derivedResources',
            'tricks.levels',
            'creator',
            'updater',
        ]);

        $seriesResources = collect();

        if ($resource->resource_series_id) {
            $seriesResources = Resource::query()
                ->where(
                    'resource_series_id',
                    $resource->resource_series_id
                )
                ->orderByRaw(
                    'CASE WHEN first_sent IS NULL THEN 1 ELSE 0 END'
                )
                ->orderBy('first_sent')
                ->orderBy('created_at')
                ->get();
        }

        $relatedResources = $resource
            ->relatedResources
            ->merge($resource->inverseRelatedResources)
            ->unique('id')
            ->sortBy('title')
            ->values();

        $isMobile = request()
            ->attributes
            ->get('isMobile', false);

        if (! $isMobile) {
            return redirect()->route(
                'admin-v2.resource-library.index',
                ['resource' => $resource->id]
            );
        }

        return view(
            'admin.dashboard-v2.mobile.resource-library.show',
            [
                'navigation' => \App\Navigation\AdminNavigation::items(),
                'resource' => $resource,
                'seriesResources' => $seriesResources,
                'relatedResources' => $relatedResources,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit(Resource $resource)
    {
        $resource->load([
            'category',
            'type',
            'series',
            'basedOn',
            'tricks',
        ]);

        $categories = ResourceCategory::query()
            ->where(function ($query) use ($resource) {
                $query
                    ->where('is_active', true)
                    ->orWhere(
                        'id',
                        $resource->resource_category_id
                    );
            })
            ->orderBy('name')
            ->get();

        $types = ResourceType::query()
            ->where(function ($query) use ($resource) {
                $query
                    ->where('is_active', true)
                    ->orWhere(
                        'id',
                        $resource->resource_type_id
                    );
            })
            ->orderBy('name')
            ->get();

        $series = ResourceSeries::query()
            ->with('category')
            ->orderBy('name')
            ->get();

        $tricks = Trick::query()
            ->with('levels')
            ->orderByRaw('LOWER(name)')
            ->get();

        $relatedResources = Resource::query()
            ->where('id', '!=', $resource->id)
            ->orderByRaw('LOWER(title)')
            ->get();

        $selectedTrickIds = $resource
            ->tricks
            ->pluck('id')
            ->values()
            ->all();

        $selectedRelatedResourceIds = $resource
            ->relatedResources
            ->merge($resource->inverseRelatedResources)
            ->pluck('id')
            ->unique()
            ->values()
            ->all();

        dd([
    'selectedTrickIds' => $selectedTrickIds,
    'selectedRelatedResourceIds' => $selectedRelatedResourceIds,
]);


        return view(
            'admin.dashboard-v2.resource-library.edit',
            [
                'navigation' => \App\Navigation\AdminNavigation::items(),
                'resource' => $resource,
                'categories' => $categories,
                'types' => $types,
                'series' => $series,
                'tricks' => $tricks,
                'relatedResources' => $relatedResources,
                'selectedTrickIds' => $selectedTrickIds,
                'selectedRelatedResourceIds' =>
                    $selectedRelatedResourceIds,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(
    UpdateResourceRequest $request,
    Resource $resource
) {

    $resource = $this->resourceService->update(
        $resource,
        $request->validated()
    );

    return redirect()
        ->route(
            'admin-v2.resource-library.index',
            ['resource' => $resource->id]
        )
        ->with('success', 'Resource updated.');
}

    /*
    |--------------------------------------------------------------------------
    | Destroy
    |--------------------------------------------------------------------------
    */

    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect()
            ->route('admin-v2.resource-library.index')
            ->with('success', 'Resource deleted.');
    }

    /*
    |--------------------------------------------------------------------------
    | Index Query
    |--------------------------------------------------------------------------
    */

    protected function buildIndexQuery(): Builder
    {
        return Resource::query()
            ->with([
                'category',
                'type',
                'series',
                'tricks.levels',
                'creator',
                'updater',
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

    protected function applySearch(
        Builder $query,
        Request $request
    ): void {
        if (! $request->filled('search')) {
            return;
        }

        $search = trim($request->search);

        $query->where(function (Builder $query) use ($search) {
            $query
                ->where('title', 'like', "%{$search}%")
                ->orWhere('body', 'like', "%{$search}%")
                ->orWhereHas(
                    'category',
                    fn (Builder $categoryQuery) =>
                        $categoryQuery->where(
                            'name',
                            'like',
                            "%{$search}%"
                        )
                )
                ->orWhereHas(
                    'type',
                    fn (Builder $typeQuery) =>
                        $typeQuery->where(
                            'name',
                            'like',
                            "%{$search}%"
                        )
                )
                ->orWhereHas(
                    'series',
                    fn (Builder $seriesQuery) =>
                        $seriesQuery->where(
                            'name',
                            'like',
                            "%{$search}%"
                        )
                )
                ->orWhereHas(
                    'tricks',
                    fn (Builder $trickQuery) =>
                        $trickQuery->where(
                            'name',
                            'like',
                            "%{$search}%"
                        )
                );
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Filters
    |--------------------------------------------------------------------------
    */

    protected function applyFilters(
        Builder $query,
        Request $request
    ): void {
        if ($request->filled('category')) {
            $query->where(
                'resource_category_id',
                $request->category
            );
        }

        if ($request->filled('type')) {
            $query->where(
                'resource_type_id',
                $request->type
            );
        }

        if ($request->filled('status')) {
            if ($request->status !== 'all') {
                $query->where(
                    'status',
                    $request->status
                );
            }
        } else {
            $query->where('status', 'active');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Sorting
    |--------------------------------------------------------------------------
    */

    protected function applySorting(
        Builder $query,
        Request $request
    ): void {
        switch ($request->sort) {
            case 'oldest':
                $query
                    ->orderByRaw(
                        'CASE WHEN first_sent IS NULL THEN 1 ELSE 0 END'
                    )
                    ->orderBy('first_sent')
                    ->orderBy('created_at');
                break;

            case 'title':
                $query->orderByRaw('LOWER(title) ASC');
                break;

            case 'title_desc':
                $query->orderByRaw('LOWER(title) DESC');
                break;

            case 'updated':
                $query->latest('updated_at');
                break;

            default:
                $query
                    ->orderByRaw(
                        'CASE WHEN first_sent IS NULL THEN 1 ELSE 0 END'
                    )
                    ->orderByDesc('first_sent')
                    ->orderByDesc('created_at');
                break;
        }
    }
}
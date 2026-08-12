<?php

namespace App\Services\ResourceLibrary;

use App\Models\ResourceLibrary\Resource;
use App\Models\ResourceLibrary\ResourceSeries;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class ResourceService
{
    /*
    |--------------------------------------------------------------------------
    | Store Resource
    |--------------------------------------------------------------------------
    */

    public function store(
        array $data,
        ?int $userId = null
    ): Resource {
        $userId = $this->resolveUserId($userId);

        return DB::transaction(function () use ($data, $userId) {

            $data = $this->resolveSeries(
                $data,
                $userId
            );

            $resource = Resource::create([
                'title' => $data['title'],
                'body' => $data['body'],
                'resource_category_id' => $data['resource_category_id'],
                'resource_type_id' => $data['resource_type_id'],
                'resource_series_id' => $data['resource_series_id'] ?? null,
                'based_on_resource_id' => $data['based_on_resource_id'] ?? null,
                'status' => $data['status'],
                'first_sent' => $data['first_sent'] ?? null,
                'created_by' => $userId,
                'updated_by' => $userId,
            ]);


            $this->syncBehaviors(
                $resource,
                $data['tricks'] ?? []
            );

            $this->syncRelatedResources(
                $resource,
                $data['related_resources'] ?? []
            );

            return $resource;
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Update Resource
    |--------------------------------------------------------------------------
    */

    public function update(
        Resource $resource,
        array $data,
        ?int $userId = null
    ): Resource {
        $userId = $this->resolveUserId($userId);

        return DB::transaction(function () use (
            $resource,
            $data,
            $userId
        ) {

            $data = $this->resolveSeries(
                $data,
                $userId
            );

            $resource->update([
                'title' => $data['title'],
                'body' => $data['body'],
                'resource_category_id' => $data['resource_category_id'],
                'resource_type_id' => $data['resource_type_id'],
                'resource_series_id' => $data['resource_series_id'] ?? null,
                'based_on_resource_id' => $data['based_on_resource_id'] ?? null,
                'status' => $data['status'],
                'first_sent' => $this->resolveFirstSent(
                    $resource,
                    $data['first_sent'] ?? null
                ),
                'updated_by' => $userId,
            ]);

            $this->syncBehaviors(
                $resource,
                $data['tricks'] ?? []
            );

            $this->syncRelatedResources(
                $resource,
                $data['related_resources'] ?? []
            );

            return $resource->fresh();
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Resolve User
    |--------------------------------------------------------------------------
    */

    protected function resolveUserId(
        ?int $userId
    ): int {
        $resolvedUserId = $userId ?? auth()->id();

        if (! $resolvedUserId) {
            throw new RuntimeException(
                'A user is required to create or update a Resource.'
            );
        }

        return $resolvedUserId;
    }

    /*
    |--------------------------------------------------------------------------
    | Resolve Series
    |--------------------------------------------------------------------------
    */

    protected function resolveSeries(
        array $data,
        int $userId
    ): array {
        if (! empty($data['new_series_name'])) {

            $series = ResourceSeries::firstOrCreate(
                [
                    'resource_category_id' =>
                        $data['resource_category_id'],
                    'name' => trim(
                        $data['new_series_name']
                    ),
                ],
                [
                    'created_by' => $userId,
                ]
            );

            $data['resource_series_id'] = $series->id;
        }

        unset($data['new_series_name']);

        return $data;
    }

    /*
    |--------------------------------------------------------------------------
    | First Sent
    |--------------------------------------------------------------------------
    */

    protected function resolveFirstSent(
        Resource $resource,
        ?string $submittedFirstSent
    ): mixed {
        if ($resource->first_sent !== null) {
            return $resource->first_sent;
        }

        return $submittedFirstSent;
    }

    /*
    |--------------------------------------------------------------------------
    | Sync Behaviors
    |--------------------------------------------------------------------------
    */

    protected function syncBehaviors(
    Resource $resource,
    array $trickIds
): void {
    $resource->tricks()->sync($trickIds);

    dd([
        'after_sync' => $resource->tricks()->pluck('tricks.id')->all(),
    ]);
}

    /*
    |--------------------------------------------------------------------------
    | Sync Related Resources
    |--------------------------------------------------------------------------
    */

    protected function syncRelatedResources(
        Resource $resource,
        array $relatedResourceIds
    ): void {
        $relatedResourceIds = collect($relatedResourceIds)
            ->map(fn ($id) => (int) $id)
            ->reject(fn ($id) => $id === $resource->id)
            ->unique()
            ->values();

        DB::table('resource_resource')
            ->where('resource_id', $resource->id)
            ->orWhere(
                'related_resource_id',
                $resource->id
            )
            ->delete();

        $now = now();

        $rows = $relatedResourceIds
            ->map(function ($relatedId) use (
                $resource,
                $now
            ) {

                $lowerId = min(
                    $resource->id,
                    $relatedId
                );

                $higherId = max(
                    $resource->id,
                    $relatedId
                );

                return [
                    'resource_id' => $lowerId,
                    'related_resource_id' => $higherId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            })
            ->all();

        if (! empty($rows)) {
            DB::table('resource_resource')
                ->insert($rows);
        }
    }
}
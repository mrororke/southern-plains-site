<?php

namespace App\Services;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditService
{
    /**
     * Write an audit log entry
     */
    public function log(string $action, $model = null, array $old = null, array $new = null): void
    {
        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'model_type' => $model ? get_class($model) : null,
            'model_id' => $model?->id,
            'old_values' => $old,
            'new_values' => $new,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
        ]);
    }

    /**
     * Get recent audit entries formatted for UI
     */
    public function recent(int $limit = 10): array
{
    return AuditLog::latest()
        ->limit($limit)
        ->get()
        ->map(fn ($log) => $this->tldr($log))
        ->toArray();
}

    /**
     * Format a single audit log entry
     */
    public function format($log): array
    {
        return [
            'id' => $log->id,
            'action' => $log->action,
            'model' => $log->model_type ? class_basename($log->model_type) : null,
            'model_id' => $log->model_id,
            'created_at' => optional($log->created_at)->format('Y-m-d H:i:s'),

            'diff' => $this->diff(
                $log->old_values ?? [],
                $log->new_values ?? []
            ),
        ];
    }

    /**
     * Build field-level diff between old and new values
     */
    public function diff(array $old = [], array $new = []): array
    {
        $allKeys = array_unique(array_merge(array_keys($old), array_keys($new)));

        $diff = [];

        foreach ($allKeys as $key) {
            $oldValue = $old[$key] ?? null;
            $newValue = $new[$key] ?? null;

            // Skip unchanged values
            if ($oldValue === $newValue) {
                continue;
            }

            $diff[] = [
                'field' => $key,
                'old' => $oldValue,
                'new' => $newValue,
            ];
        }

        return $diff;
    }

    public function tldr($log): array
{
    $diff = $this->diff(
        $log->old_values ?? [],
        $log->new_values ?? []
    );

    $totalChanges = count($diff);

    $summary = collect($diff)
        ->map(function ($change) {
            return $this->describeChange(
                $change['field'] ?? '',
                $change['old'] ?? null,
                $change['new'] ?? null
            );
        })
        ->take(3)
        ->implode(', ');

    return [
        'id' => $log->id,
        'action' => $log->action,
        'model' => class_basename($log->model_type),
        'model_id' => $log->model_id,
        'created_at' => optional($log->created_at)->format('M d, H:i'),

        'summary' => $totalChanges > 0
            ? $summary
            : 'No changes recorded',

        'diff' => $diff,
    ];
}

public function fieldLabel(string $field): string
{
    return match ($field) {

        // Core Rat fields
        'name' => 'name',
        'registered_name' => 'registered name',
        'breeder_reference' => 'breeder reference',
        'sex' => 'sex',
        'dob' => 'date of birth',
        'dod' => 'date of death',
        'variety' => 'variety',
        'eye_color' => 'eye color',
        'ear_set' => 'ear set',
        'silvered' => 'silvering',
        'is_owned' => 'ownership',
        'is_pedigree_only' => 'pedigree status',

        // Default fallback
        default => str_replace('_', ' ', $field),
    };
}

public function describeChange(string $field, $old, $new): string
{
    $label = $this->fieldLabel($field);

    // Booleans
    if (is_bool($old) || is_bool($new)) {
        if ($new) {
            return "enabled {$label}";
        }
        return "disabled {$label}";
    }

    // Null → value
    if (is_null($old) && !is_null($new)) {
        return "set {$label}";
    }

    // Value → null
    if (!is_null($old) && is_null($new)) {
        return "cleared {$label}";
    }

    // Default change
    return "updated {$label}";
}


}
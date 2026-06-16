<?php

namespace App\Services;

use App\Models\AuditLog;
use App\Support\Audit\ActivityType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditService
{
    /*
    |--------------------------------------------------------------------------
    | WRITE LOG
    |--------------------------------------------------------------------------
    */
    public function log(
        string $action,
        $model = null,
        array $old = null,
        array $new = null
    ): void {
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

    /*
    |--------------------------------------------------------------------------
    | RECENT FEED
    |--------------------------------------------------------------------------
    */
    public function recent(int $limit = 10): array
    {
        return AuditLog::latest()
            ->limit($limit)
            ->get()
            ->map(fn ($log) => $this->tldr($log))
            ->toArray();
    }

    /*
    |--------------------------------------------------------------------------
    | DIFF ENGINE
    |--------------------------------------------------------------------------
    */
    public function diff(array $old = [], array $new = []): array
    {
        $keys = array_unique(array_merge(
            array_keys($old),
            array_keys($new)
        ));

        $diff = [];

        foreach ($keys as $key) {
            $oldValue = $old[$key] ?? null;
            $newValue = $new[$key] ?? null;

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

    /*
    |--------------------------------------------------------------------------
    | TL;DR FORMATTER
    |--------------------------------------------------------------------------
    */
    public function tldr($log): array
    {
        /*
        |------------------------------------------
        | EVENT LOGS (non-diff actions)
        |------------------------------------------
        */
        if (in_array($log->action, [
            ActivityType::TRICK_NOTE_ADDED,
            ActivityType::TRICK_SUBMITTED,
            ActivityType::CONTACT_SUBMITTED,
            ActivityType::HISTORY_SUBMITTED,
        ], true)) {

            return [
                'id' => $log->id,
                'action' => $log->action,
                'model' => $log->model_type ? class_basename($log->model_type) : null,
                'model_id' => $log->model_id,
                'created_at' => optional($log->created_at)->format('M d, H:i'),

                'entity' => $this->resolveEntityLabel($log),
                'link' => $this->resolveEntityLink($log),

                'summary' => $this->resolveEventSummary($log),

                'diff' => [],
            ];
        }

        /*
        |------------------------------------------
        | DIFF-BASED LOGS
        |------------------------------------------
        */
        $diff = $this->diff(
            $log->old_values ?? [],
            $log->new_values ?? []
        );

        $summary = collect($diff)
            ->map(fn ($change) => $this->describeChange(
                $change['field'] ?? '',
                $change['old'] ?? null,
                $change['new'] ?? null
            ))
            ->take(3)
            ->implode(', ');

        return [
            'id' => $log->id,
            'action' => $log->action,
            'model' => $log->model_type ? class_basename($log->model_type) : null,
            'model_id' => $log->model_id,
            'created_at' => optional($log->created_at)->format('M d, H:i'),

            'entity' => $this->resolveEntityLabel($log),
            'link' => $this->resolveEntityLink($log),

            'summary' => $diff
                ? $summary
                : 'No changes recorded',

            'diff' => $diff,
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | EVENT SUMMARIES (ONLY SOURCE OF TRUTH)
    |--------------------------------------------------------------------------
    */
    private function resolveEventSummary($log): string
    {
        return match ($log->action) {

            ActivityType::TRICK_NOTE_ADDED
                => 'Added note: ' .
                    ($log->new_values['note_preview'] ?? ''),

            ActivityType::TRICK_SUBMITTED
                => 'Submitted trick evaluation',

            ActivityType::CONTACT_SUBMITTED
                => 'Submitted contact form',

            ActivityType::HISTORY_SUBMITTED
                => 'Submitted training history',

            default => 'Activity recorded',
        };
    }

    /*
    |--------------------------------------------------------------------------
    | FIELD LABELS
    |--------------------------------------------------------------------------
    */
    public function fieldLabel(string $field): string
    {
        return match ($field) {
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
            default => str_replace('_', ' ', $field),
        };
    }

    /*
    |--------------------------------------------------------------------------
    | CHANGE DESCRIPTIONS
    |--------------------------------------------------------------------------
    */
    public function describeChange(string $field, $old, $new): string
    {
        $label = $this->fieldLabel($field);

        if (is_bool($old) || is_bool($new)) {
            return $new ? "enabled {$label}" : "disabled {$label}";
        }

        if (is_null($old) && !is_null($new)) {
            return "set {$label}";
        }

        if (!is_null($old) && is_null($new)) {
            return "cleared {$label}";
        }

        return "updated {$label}";
    }

    /*
    |--------------------------------------------------------------------------
    | ENTITY LABELS
    |--------------------------------------------------------------------------
    */
    public function resolveEntityLabel($log): ?string
    {
        if (!$log->model_type || !$log->model_id) {
            return $this->resolveEventSummary($log);
        }

        try {
            $class = $log->model_type;

            if (!class_exists($class)) {
                return null;
            }

            $model = $class::find($log->model_id);

            if (!$model) {
                return class_basename($class) . ' #' . $log->model_id;
            }

            return $model->registered_name
                ?? $model->name
                ?? class_basename($class) . ' #' . $model->id;

        } catch (\Throwable $e) {
            return null;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | ENTITY LINKS (STEP 5 CLEANED)
    |--------------------------------------------------------------------------
    */
    public function resolveEntityLink($log): ?string
    {
        return match ($log->action) {

            ActivityType::TRICK_NOTE_ADDED,
            ActivityType::TRICK_SUBMITTED
                => $log->model_id
                    ? route('admin.tricks.show', $log->model_id)
                    : null,

            ActivityType::CONTACT_SUBMITTED,
            ActivityType::HISTORY_SUBMITTED
                => null,

            default => null,
        };
    }
}
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

    /**
     * Get recent activity feed (ready for UI)
     */
    public function recent(int $limit = 10)
    {
        return AuditLog::query()
            ->latest()
            ->limit($limit)
            ->get()
            ->map(fn ($log) => $this->format($log));
    }

    /**
     * Normalize audit log for UI consumption
     */
    public function format(AuditLog $log): array
    {
        return [
            'id' => $log->id,
            'action' => $log->action,
            'label' => $this->buildLabel($log),

            'model_type' => $log->model_type,
            'model_id' => $log->model_id,

            'old' => $log->old_values ?? [],
            'new' => $log->new_values ?? [],

            'user_id' => $log->user_id,

            'ip_address' => $log->ip_address,
            'user_agent' => $log->user_agent,

            'created_at' => $log->created_at,
        ];
    }

    /**
     * Human-readable action label for UI
     */
    private function buildLabel(AuditLog $log): string
    {
        $parts = explode('.', $log->action);

        $model = ucfirst($parts[0] ?? 'Item');
        $verb = ucfirst($parts[1] ?? 'updated');

        return "{$verb} {$model}";
    }
}
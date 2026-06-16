<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class TrickEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_name',
        'email',
        'dog_name',
        'dog_number',
        'trick_level',
        'eval_method',
        'video_link',
        'scheduled_datetime',
        'additional_dogs',
        'payment_method',
        'total_fee',
        'status',
    ];

    protected $casts = [
        'additional_dogs' => 'array',
        'scheduled_datetime' => 'datetime',
    ];

    public const STATUS_LABELS = [
    'new' => 'New',
    'in_review' => 'In Review',
    'awaiting_client' => 'Awaiting Client',
    'completed' => 'Completed',
    'archived' => 'Archived',
];

public const STATUS_COLORS = [
    'new' => 'bg-blue-100 text-blue-800',
    'in_review' => 'bg-yellow-100 text-yellow-800',
    'awaiting_client' => 'bg-purple-100 text-purple-800',
    'completed' => 'bg-gray-100 text-gray-800',
    'archived' => 'bg-gray-100 text-gray-500',
];

public const TRANSITIONS = [
    'new' => ['in_review'],
    'in_review' => ['awaiting_client', 'completed'],
    'awaiting_client' => ['in_review', 'completed'],
    'completed' => ['archived'],
    'archived' => ['completed'],
];

public static function label(string $status): string
{
    return self::STATUS_LABELS[$status] ?? $status;
}

public static function color(string $status): string
{
    return self::STATUS_COLORS[$status] ?? 'bg-gray-100 text-gray-800';
}

public static function allowedTransitions(string $status): array
{
    return self::TRANSITIONS[$status] ?? [];
}

public function timeInStatus(): string
{
    // assumes you have updated_at representing last change
    $minutes = Carbon::parse($this->updated_at)->diffInMinutes(now());

    if ($minutes < 60) {
        return $minutes . ' min';
    }

    $hours = floor($minutes / 60);

    if ($hours < 24) {
        return $hours . ' hr';
    }

    $days = floor($hours / 24);

    return $days . ' day' . ($days > 1 ? 's' : '');
}

public function recommendedAction(): ?string
{
    return match ($this->status) {

        'new' => 'Move to In Review',

        'in_review' => 'Review submission or request client input',

        'awaiting_client' => 'Follow up with client',

        'completed' => 'Archive or finalize record',

        'archived' => null,

        default => null,
    };
}

public function isStuck(): bool
{
    return match ($this->status) {

        'new' => Carbon::parse($this->updated_at)->diffInHours(now()) > 24,

        'in_review' => Carbon::parse($this->updated_at)->diffInDays(now()) > 2,

        'awaiting_client' => Carbon::parse($this->updated_at)->diffInDays(now()) > 3,

        default => false,
    };
}

public function notes()
{
    return $this->hasMany(TrickEvaluationNote::class);
}



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}

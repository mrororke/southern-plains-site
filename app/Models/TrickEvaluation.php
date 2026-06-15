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

}

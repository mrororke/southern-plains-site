<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'type',
        'event_id',
        'name',
        'email',
        'subject',
        'message',
        'details',
        'read_at',
        'resolved_at',
        'archived_at',
    ];

    protected $casts = [
        'details' => 'array',
        'read_at' => 'datetime',
        'resolved_at' => 'datetime',
        'archived_at' => 'datetime',
    ];

    /**
     * Get the event associated with this inquiry.
     */
    public function event()
    {
        return $this->belongsTo(EventV2::class, 'event_id');
    }
}

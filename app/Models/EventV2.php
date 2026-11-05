<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventV2 extends Model
{
    use HasFactory;

    protected $table = 'events_v2';

    protected $fillable = [
        'type',
        'status',
        'title',
        'slug',
        'short_description',
        'description',
        'featured_image_path',
        'featured_image_alt',
        'featured_image_credit',
        'featured_image_credit_url',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'venue_name',
        'address',
        'city',
        'state',
        'is_private_location',
        'location_details',
        'registration_status',
        'registration_url',
        'registration_deadline',
        'registration_notes',
        'what_to_expect',
        'what_to_bring',
        'requirements_notes',
        'cta_label',
        'cta_url',
        'seo_title',
        'seo_description',
        'published_at',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'is_private_location' => 'boolean',
        'registration_deadline' => 'date',
        'published_at' => 'datetime',
    ];

    /**
     * Determine the effective end date of the event.
     *
     * Single-day events use their start date when no end date
     * has been provided.
     */
    public function getEffectiveEndDateAttribute()
    {
        return $this->end_date ?? $this->start_date;
    }

    /**
     * Determine whether the event is currently published.
     */
    public function isPublished(): bool
    {
        return $this->status === 'published'
            && $this->published_at
            && $this->published_at->lte(now());
    }

    /**
     * Determine whether the event has already ended.
     */
    public function hasEnded(): bool
    {
        return $this->effective_end_date->lt(today());
    }

    /**
     * Determine whether the event is upcoming.
     */
    public function isUpcoming(): bool
    {
        return ! $this->hasEnded();
    }

    /**
     * Determine whether registration should be considered closed
     * because the event ended more than three days ago.
     */
    public function registrationHasAutomaticallyClosed(): bool
    {
        return $this->effective_end_date
            ->addDays(3)
            ->lt(today());
    }

    /**
     * Determine the effective registration status for public display.
     *
     * Registration is automatically treated as closed three days
     * after the event ends, without changing the stored status.
     */
    public function getEffectiveRegistrationStatusAttribute(): string
    {
        if (
            $this->registration_status === 'open'
            && $this->registrationHasAutomaticallyClosed()
        ) {
            return 'closed';
        }

        return $this->registration_status;
    }

    /**
     * Determine whether registration is currently open.
     */
    public function registrationIsOpen(): bool
    {
        return $this->effective_registration_status === 'open';
    }

    /**
     * Determine whether the location should be displayed publicly.
     */
    public function locationIsPrivate(): bool
    {
        return $this->is_private_location;
    }
}
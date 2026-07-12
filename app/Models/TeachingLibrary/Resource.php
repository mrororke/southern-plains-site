<?php

namespace App\Models\TeachingLibrary;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'internal_title',
        'email_subject',
        'slug',
        'summary',
        'body',
        'resource_category_id',
        'status',
        'is_template',
        'author_id',
        'updated_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($resource) {

            $resource->slug = Str::slug($resource->internal_title);

            $resource->summary = static::generateSummary($resource->body);

            if (Auth::check()) {
                $resource->author_id = Auth::id();
                $resource->updated_by = Auth::id();
            }

        });

        static::updating(function ($resource) {

            if ($resource->isDirty('internal_title')) {
                $resource->slug = Str::slug($resource->internal_title);
            }

            if ($resource->isDirty('body')) {
                $resource->summary = static::generateSummary($resource->body);
            }

            if (Auth::check()) {
                $resource->updated_by = Auth::id();
            }

        });
    }

    protected static function generateSummary(?string $html): ?string
    {
        if (blank($html)) {
            return null;
        }

        preg_match('/<p>(.*?)<\/p>/is', $html, $matches);

        if (! isset($matches[1])) {
            return null;
        }

        $summary = trim(strip_tags($matches[1]));

        return $summary !== '' ? $summary : null;
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'resource_category_id');
    }

    public function tags(){
        return $this->belongsToMany(ResourceTag::class);
    }

    public function audiences(){
        return $this->belongstoMany(ResourceAudience::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}

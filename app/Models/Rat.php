<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RatBreeder;
use App\Models\RatLitter;
use App\Models\RatWeight;
use App\Models\RatHealthRecord;
use App\Models\RatTemperamentAssessment;
use App\Models\RatAttachment;
use App\Models\RatOutbreak;

class Rat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registered_name',
        'breeder_reference',
        'sex',
        'dob',
        'dod',
        'variety',
        'color',
        'silvered',
        'markings',
        'eye_color',
        'ear_set',
        'breeder_id',
        'sire_id',
        'dam_id',
        'temperament',
        'deformities',
        'abnormalities',
        'is_owned',
        'is_pedigree_only',
    ];

    // Parents
    public function sire()
    {
        return $this->belongsTo(Rat::class, 'sire_id');
    }

    public function dam()
    {
        return $this->belongsTo(Rat::class, 'dam_id');
    }

    // Breeder
    public function breeder()
    {
        return $this->belongsTo(RatBreeder::class, 'breeder_id');
    }

    // Litters (derived)
    public function littersAsSire()
    {
        return $this->hasMany(RatLitter::class, 'sire_id');
    }

    public function littersAsDam()
    {
        return $this->hasMany(RatLitter::class, 'dam_id');
    }

    // Time-series data
    public function weights()
    {
        return $this->hasMany(RatWeight::class);
    }

    public function healthRecords()
    {
        return $this->hasMany(RatHealthRecord::class);
    }

    public function temperamentAssessments()
    {
        return $this->hasMany(RatTemperamentAssessment::class);
    }

    // Media
    public function attachments()
    {
        return $this->hasMany(RatAttachment::class);
    }

    // Outbreaks
    public function outbreaks()
    {
        return $this->belongsToMany(
            RatOutbreak::class,
            'rat_outbreak_rat',
            'rat_id',
            'rat_outbreak_id'
        );
    }
}
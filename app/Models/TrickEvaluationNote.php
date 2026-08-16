<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrickEvaluationNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'trick_evaluation_id',
        'user_id',
        'body',
    ];

    public function evaluation()
    {
        return $this->belongsTo(TrickEvaluation::class, 'trick_evaluation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

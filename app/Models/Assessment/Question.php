<?php

namespace App\Models\Assessment;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'quiz_id',
        'slug',
        'question',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}

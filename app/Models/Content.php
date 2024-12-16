<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'lesson_id',
        'title',
        'type',
        'file'
    ];

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
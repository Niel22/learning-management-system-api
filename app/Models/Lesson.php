<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'course_id',
        'order',
        'duration'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function content(){
        return $this->hasMany(Content::class);
    }
}

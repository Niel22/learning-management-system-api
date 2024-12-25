<?php

namespace App\Models\Course;

use App\Models\Course\Content;
use App\Models\Progress\LessonProgress;
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

    public function progress()
    {
        return $this->hasMany(LessonProgress::class);
    }
}

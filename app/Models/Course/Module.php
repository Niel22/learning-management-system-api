<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'description'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}

<?php

namespace App\Models\Course;

use App\Models\Progress\ModuleProgress;
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

    public function progress()
    {
        return $this->hasMany(ModuleProgress::class);
    }
}

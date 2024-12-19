<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonProgress extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'progress',
        'is_completed'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}

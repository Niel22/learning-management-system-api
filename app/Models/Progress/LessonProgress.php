<?php

namespace App\Models\Progress;

use App\Models\User;
use App\Models\Course\Course;
use App\Models\Course\Lesson;
use Illuminate\Database\Eloquent\Model;

class LessonProgress extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'lesson_id',
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

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}

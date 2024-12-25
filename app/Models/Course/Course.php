<?php

namespace App\Models\Course;

use App\Models\Assessment\Quiz;
use App\Models\User;
use App\Models\Course\Lesson;
use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'instructor_id',
        'title',
        'description',
        'slug',
        'thumbnail',
        'course_category_id'
    ];

    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id', 'id');
    }

    public function lessons(){
        return  $this->hasMany(Lesson::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }
}

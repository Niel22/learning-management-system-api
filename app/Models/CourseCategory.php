<?php

namespace App\Models;

use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $fillable = [
        'name', 'slug','description'
    ];

    public function course()
    {
        return $this->hasMany(Course::class, 'course_category_id', 'id');
    }
}

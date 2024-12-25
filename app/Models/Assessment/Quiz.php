<?php

namespace App\Models\Assessment;

use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'description'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

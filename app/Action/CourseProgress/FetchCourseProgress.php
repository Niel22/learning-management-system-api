<?php

namespace App\Action\CourseProgress;

use Illuminate\Support\Facades\Auth;
use App\Models\Progress\CourseProgress;



class FetchCourseProgress
{
    public function execute($courseId)
    {
        $progress = CourseProgress::with('student', 'course')
                                    ->where('student_id', Auth::id())
                                    ->where('course_id', $courseId)
                                    ->first();
        
        if(!empty($progress))
        {
            return $progress;
        }

        return false;
    }
}
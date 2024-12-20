<?php

namespace App\Action\CourseProgress;

use App\Models\CourseProgress;

class FetchCourseProgress
{
    public function execute($studentId, $courseId)
    {
        $progress = CourseProgress::where('student_id', $studentId)
                                    ->where('course_id', $courseId)
                                    ->first();
        
        if(!empty($progress))
        {
            return $progress;
        }

        return false;
    }
}
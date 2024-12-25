<?php

namespace App\Action\LessonProgress;

use App\Models\Progress\LessonProgress;



class FetchLessonProgress
{
    public function execute($studentId, $courseId, $lessonId)
    {
        $progress = LessonProgress::with('student', 'course', 'lesson')->where('student_id', $studentId)
                                    ->where('course_id', $courseId)
                                    ->where('lesson_id', $lessonId)
                                    ->first();
                                    
        if(!empty($progress))
        {
            return $progress;
        }

        return false;
    }
}
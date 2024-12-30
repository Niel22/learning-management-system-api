<?php

namespace App\Action\ModuleProgress;

use App\Models\Progress\ModuleProgress;



class FetchModuleProgress
{
    public function execute($studentId, $courseId, $moduleId)
    {
        $progress = ModuleProgress::with('student', 'course', 'module')->where('student_id', $studentId)
                                    ->where('course_id', $courseId)
                                    ->where('module_id', $moduleId)
                                    ->first();
                                    
        if(!empty($progress))
        {
            return $progress;
        }

        return false;
    }
}
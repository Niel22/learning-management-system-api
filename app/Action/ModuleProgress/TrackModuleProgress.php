<?php

namespace App\Action\ModuleProgress;

use App\Models\Course\Course;
use App\Models\Course\Lesson;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress\ModuleProgress;
use App\Action\CourseProgress\TrackCourseProgress;
use App\Models\Course\Module;

class TrackModuleProgress
{
    public function execute($studentId, $courseId, $moduleId)
    {
        if(Self::exist($studentId, $courseId, $moduleId))
        {
            $progress = ModuleProgress::firstOrCreate([
                'student_id' => $studentId,
                'course_id' => $courseId,
                'module_id' => $moduleId,
            ]);

            $content = Lesson::where('module_id', $moduleId)->count();


            if($progress->progress != $content)
            {
                $progress->progress += 1;
                $progress->save();


                $action = new TrackCourseProgress();
                $action->execute($studentId, $courseId);

                
            } 
            return true;

            
        }

        return false;
    }

    protected function exist($studentId, $courseId, $module_id)
    {
        if($studentId == Auth::id() && Course::where('id', $courseId)->exists() && Module::where('id', $module_id)->exists())
        {
            return true;
        }

        return false;
    }
}
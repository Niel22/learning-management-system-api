<?php

namespace App\Action\CourseProgress;

use App\Models\Course\Course;
use App\Models\Course\Lesson;
use App\Models\Course\Module;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress\CourseProgress;
use App\Models\Progress\ModuleProgress;

class TrackCourseProgress
{
    public function execute($courseId)
    {
        
            $progress = CourseProgress::firstOrCreate([
                'student_id' => Auth::id(),
                'course_id' => $courseId
            ]);

            $modules = Module::where('course_id', $courseId)->get();
            $count = 0;
            foreach($modules as $module){
                $count += ModuleProgress::where('module_id', $module->id)
                                        ->where('progress', $modules->count())
                                        ->count();
            }

            if($progress->progress != $modules->count())
            {
                $progress->progress = $count;

                $progress->save();

                return true;
            }

        return false;
    }

}
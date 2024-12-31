<?php

namespace App\Action\CourseProgress;

use App\Events\CourseCompleted;
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
                $lesson = Lesson::where('module_id', $module->id)->count();
                $count += ModuleProgress::where('module_id', $module->id)
                                        ->where('progress', $lesson)
                                        ->count();
            }

            if($progress->progress != $modules->count())
            {
                $progress->progress = $count;

                $progress->save();

                if($progress->progress == $modules->count())
                {
                    event(new CourseCompleted($progress));
                }

                return true;
            }


        return false;
    }

}
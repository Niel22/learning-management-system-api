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
    public function execute($moduleId, $request)
    {
       
            $progress = ModuleProgress::firstOrCreate([
                'student_id' => Auth::id(),
                'course_id' => $request['course_id'],
                'module_id' => $moduleId,
            ]);

            $content = Lesson::where('module_id', $moduleId)->count();


            if($progress->progress != $content)
            {
                $progress->progress += 1;
                $progress->save();


                $action = new TrackCourseProgress();
                $action->execute($request['course_id']);

                
                return true;
            } 

            

        return false;
    }
}
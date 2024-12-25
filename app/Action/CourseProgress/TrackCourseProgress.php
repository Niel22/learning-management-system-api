<?php

namespace App\Action\CourseProgress;

use App\Models\Course\Course;
use App\Models\Course\Lesson;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress\CourseProgress;
use App\Models\Progress\LessonProgress;

class TrackCourseProgress
{
    public function execute($studentId, $courseId)
    {
        if(Self::exist($studentId, $courseId))
        {
            $progress = CourseProgress::firstOrCreate([
                'student_id' => $studentId,
                'course_id' => $courseId
            ]);

            $lessons = Lesson::where('course_id', $courseId)->get();
            $count = 0;
            foreach($lessons as $lesson){
                $count += LessonProgress::where('lesson_id', $lesson->id)
                                        ->where('is_completed', true)
                                        ->count();
            }

            if($progress->progress != $lessons->count())
            {
                $progress->progress = $count;

                if($progress->progress == $lessons->count())
                {  
                    $progress->is_completed = true;
                    
                }
                $progress->save();

                return true;
            }
        }

        return false;
    }

    protected function exist($studentId, $courseId)
    {
        if($studentId == Auth::id() && Course::where('id', $courseId)->exists())
        {
            return true;
        }

        return false;
    }
}
<?php

namespace App\Action\LessonProgress;

use App\Models\Course\Course;
use App\Models\Course\Lesson;
use App\Models\Course\Content;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress\LessonProgress;
use App\Action\CourseProgress\TrackCourseProgress;

class TrackLessonProgress
{
    public function execute($studentId, $courseId, $lessonId)
    {
        if(Self::exist($studentId, $courseId, $lessonId))
        {
            $progress = LessonProgress::firstOrCreate([
                'student_id' => $studentId,
                'course_id' => $courseId,
                'lesson_id' => $lessonId,
            ]);

            $content = Content::where('lesson_id', $lessonId)->count();


            if($progress->progress != $content)
            {
                $progress->progress += 1;
                $progress->save();

                $action = new TrackCourseProgress();

                $action->execute($studentId, $courseId);
                
                if($progress->progress == $content){
    
                    $progress->is_completed = true;
                    $progress->save();

                    return true;
                }

            } 

            
        }

        return false;
    }

    protected function exist($studentId, $courseId, $lessonId)
    {
        if($studentId == Auth::id() && Course::where('id', $courseId)->exists() && Lesson::where('id', $lessonId))
        {
            return true;
        }

        return false;
    }
}
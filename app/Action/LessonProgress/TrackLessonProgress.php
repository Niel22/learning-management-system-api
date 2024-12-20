<?php

namespace App\Action\LessonProgress;

use App\Models\User;
use App\Models\Content;
use App\Models\LessonProgress;
use Illuminate\Support\Facades\Auth;

class TrackLessonProgress
{
    public function execute($studentId, $courseId, $lessonId)
    {
        if($studentId == Auth::id())
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

                if($progress->progress == $content){
    
                    $progress->is_completed = true;
                    $progress->save();
                }

                return true;
            } 

            
        }

        return false;
    }
}
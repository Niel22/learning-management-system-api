<?php

namespace App\Action\Lesson;

use App\Models\Lesson;

class DeleteLesson{

    public function execute($courseId, $id){
        $lesson = Lesson::where('course_id', $courseId)->where('id', $id)->first();

        if(!empty($lesson)){
            return $lesson->delete();
        }

        return false;
    }
}
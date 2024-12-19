<?php

namespace App\Action\Lesson;

use App\Models\Lesson;

class FetchSingleLesson{

    public function execute($courseId, $id){
        $lesson = Lesson::with('course')->where('course_id', $courseId)->find($id);

        if(!empty($lesson)){
            return $lesson;
        }

        return false;
    }
}
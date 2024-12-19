<?php

namespace App\Action\Lesson;

use App\Models\Lesson;

class FetchAllLesson{

    public function execute($courseId){
        $lessons = Lesson::with('course', 'content')->where('course_id', $courseId)->paginate(10);

        if($lessons->isNotEmpty()){
            return $lessons;
        }

        return false;
    }
}
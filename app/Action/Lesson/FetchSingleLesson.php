<?php

namespace App\Action\Lesson;

use App\Models\Lesson;
use App\Helpers\ModelFinder;

class FetchSingleLesson{

    public function execute($courseId, $id){
        $lesson = ModelFinder::findBySlugOrId($id, new Lesson(), 'course_id', $courseId);

        if(!empty($lesson)){
            return $lesson;
        }

        return false;
    }
}
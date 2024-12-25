<?php

namespace App\Action\Lesson;

use App\Helpers\ModelFinder;
use App\Models\Course\Lesson;

class FetchSingleLesson{

    public function execute($courseId, $id){
        $lesson = ModelFinder::findBySlugOrId($id, new Lesson(), ['course'], 'course_id', $courseId);

        if(!empty($lesson)){
            return $lesson;
        }

        return false;
    }
}
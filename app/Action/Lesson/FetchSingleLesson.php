<?php

namespace App\Action\Lesson;

use App\Helpers\ModelFinder;
use App\Models\Course\Lesson;

class FetchSingleLesson{

    public function execute($moduleId, $id){
        $lesson = ModelFinder::findBySlugOrId($id, new Lesson(), ['module'], 'module_id', $moduleId);

        if(!empty($lesson)){
            return $lesson;
        }

        return false;
    }
}
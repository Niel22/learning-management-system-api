<?php

namespace App\Action\Course;

use App\Helpers\ModelFinder;
use App\Models\Course\Course;

class FetchSingleCourse{

    public function execute($id){
        $course = ModelFinder::findBySlugOrId($id, new Course());

        if(!empty($course)){
            return $course;
        }

        return false;
    }
}
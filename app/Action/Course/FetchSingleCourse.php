<?php

namespace App\Action\Course;

use App\Models\Course;
use App\Helpers\ModelFinder;

class FetchSingleCourse{

    public function execute($id){
        $course = ModelFinder::findBySlugOrId($id, new Course());

        if(!empty($course)){
            return $course;
        }

        return false;
    }
}
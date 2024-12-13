<?php

namespace App\Action\Course;

use App\Models\Course;

class FetchSingleCourse{

    public function execute($id){
        $course = Course::find($id);

        if(!empty($course)){
            return $course;
        }

        return false;
    }
}
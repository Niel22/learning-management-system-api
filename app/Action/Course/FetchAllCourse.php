<?php

namespace App\Action\Course;

use App\Models\Course;

class FetchAllCourse{

    public function execute(){
        $courses = Course::with('instructor', 'category')->paginate(10);

        if($courses->isNotEmpty()){
            return $courses;
        }

        return false;
    }
}
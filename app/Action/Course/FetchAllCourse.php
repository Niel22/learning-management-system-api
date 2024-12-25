<?php

namespace App\Action\Course;

use App\Models\Course\Course;



class FetchAllCourse{

    public function execute(){
        $courses = Course::with('instructor', 'category', 'lessons')->paginate(10);

        if($courses->isNotEmpty()){
            return $courses;
        }

        return false;
    }
}
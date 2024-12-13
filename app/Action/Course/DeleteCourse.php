<?php

namespace App\Action\Course;

use App\Models\Course;

class DeleteCourse{
    public function execute($id){

        $course = Course::find($id);

        if(!empty($course)){
            return $course->delete();
        }

        return false;
    }
}
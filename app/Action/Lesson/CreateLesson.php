<?php

namespace App\Action\Lesson;

use Illuminate\Support\Str;
use App\Models\Course\Course;

class CreateLesson{

    public function execute($courseId, $request){

        $request['slug'] = Str::slug($request['title']);
        $course = Course::find($courseId);

        if(!empty($course)){

            $lesson = $course->lessons()->create($request);
            
            if($lesson){
                return true;
            }
        }

        return false;
    }
}
<?php

namespace App\Action\Lesson;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Str;

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
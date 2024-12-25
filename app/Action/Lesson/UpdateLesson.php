<?php

namespace App\Action\Lesson;

use Illuminate\Support\Str;
use App\Models\Course\Lesson;

class UpdateLesson{

    public function execute($courseId, $id, $request){
        $lesson = Lesson::where('course_id', $courseId)->where('id', $id)->first();

        $request['slug'] = Str::slug($request['title']);
        
        if(!empty($lesson)){
            return $lesson->update($request);
        }

        return false;
    }
}
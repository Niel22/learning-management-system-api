<?php

namespace App\Action\Lesson;

use App\Models\Lesson;

class FetchSingleLesson{

    public function execute($id){
        $lesson = Lesson::with('course')->find($id);

        if(!empty($lesson)){
            return $lesson;
        }

        return false;
    }
}
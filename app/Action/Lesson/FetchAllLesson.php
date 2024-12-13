<?php

namespace App\Action\Lesson;

use App\Models\Lesson;

class FetchAllLesson{

    public function execute(){
        $lessons = Lesson::with('course')->paginate(10);

        if($lessons->isNotEmpty()){
            return $lessons;
        }

        return false;
    }
}
<?php

namespace App\Action\Lesson;

use App\Models\Lesson;

class DeleteLesson{

    public function execute($id){
        $lesson = Lesson::find($id);

        if(!empty($lesson)){
            return $lesson->delete();
        }

        return false;
    }
}
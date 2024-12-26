<?php

namespace App\Action\Lesson;

use App\Models\Course\Lesson;



class FetchAllLesson{

    public function execute($moduleId){
        $lessons = Lesson::with('module')->where('module_id', $moduleId)->paginate(10);

        if($lessons->isNotEmpty()){
            return $lessons;
        }

        return false;
    }
}
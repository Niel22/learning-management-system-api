<?php

namespace App\Action\Quiz;

use App\Helpers\ModelFinder;
use App\Models\Assessment\Quiz;

class FetchSingleQuiz{

    public function execute($courseId, $id)
    {
        $quiz = ModelFinder::findBySlugOrId($id, new Quiz(), 'course_id', $courseId);
        
        if(!empty($quiz))
        {
            return $quiz;
        }
        return false;
    }
}
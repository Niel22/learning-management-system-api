<?php

namespace App\Action\Question;

use App\Helpers\ModelFinder;
use App\Models\Assessment\Question;

class FetchSingleQuestion{

    public function execute($quizId, $id)
    {
        $question = ModelFinder::findBySlugOrId($id, new Question(), ['quiz'], 'quiz_id', $quizId);
                    
        if(!empty($question))
        {
            return $question;
        }
        return false;
    }
}
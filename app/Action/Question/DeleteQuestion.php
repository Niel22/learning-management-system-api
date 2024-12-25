<?php

namespace App\Action\Question;

use App\Models\Assessment\Question;

class DeleteQuestion{

    public function execute($quizId, $id)
    {
        $question = Question::where('quiz_id', $quizId)
                            ->where('id', $id)
                            ->first();
                    
        if(!empty($question))
        {
            return $question->delete();
        }
        return false;
    }
}
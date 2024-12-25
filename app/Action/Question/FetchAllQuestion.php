<?php

namespace App\Action\Question;

use App\Models\Assessment\Question;

class FetchAllQuestion{

    public function execute($quizId)
    {
        $question = Question::with('quiz')->where('quiz_id', $quizId)
                            ->paginate(10);

        if($question->isNotEmpty())
        {
            return $question;
        }
        return false;
    }
}
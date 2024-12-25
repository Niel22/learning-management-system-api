<?php

namespace App\Action\Quiz;

use App\Models\Assessment\Quiz;

class DeleteQuiz{

    public function execute($courseId, $id)
    {
        $quiz = Quiz::where('course_id', $courseId)
                    ->where('id', $id)
                    ->first();

        if(!empty($quiz))
        {
            return $quiz->delete();
        }
        return false;
    }
}
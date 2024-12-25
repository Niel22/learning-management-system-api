<?php

namespace App\Action\Quiz;

use App\Models\Assessment\Quiz;

class FetchAllQuiz{

    public function execute($courseId)
    {
        $quiz = Quiz::where('course_Id', $courseId)->get();

        if($quiz->isNotEmpty())
        {
            return $quiz;
        }

        return false;
    }
}
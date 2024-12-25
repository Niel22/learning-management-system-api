<?php

namespace App\Action\Quiz;

use App\Models\Assessment\Quiz;

class FetchAllQuiz{

    public function execute($courseId)
    {
        $quiz = Quiz::with('course')->where('course_Id', $courseId)->paginate(10);

        if($quiz->isNotEmpty())
        {
            return $quiz;
        }

        return false;
    }
}
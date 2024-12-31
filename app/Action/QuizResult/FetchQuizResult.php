<?php

namespace App\Action\QuizResult;

use App\Models\Assessment\Quiz;
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment\QuizResult;

class FetchQuizResult
{
    
    public function execute($quizId)
    {
        $result = QuizResult::where('student_id', Auth::id())
                            ->paginate(10);

        if($result->isNotEmpty())
        {
            return $result;
        }                  
        return false;  
    }
}
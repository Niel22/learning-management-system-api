<?php

namespace App\Action\QuizResult;

use Illuminate\Support\Facades\Auth;
use App\Models\Assessment\QuizResult;

class FetchSingleResult
{

    public function execute($quizId, $id)
    {
        $result = QuizResult::where('quiz_id', $quizId)
                            ->where('student_id', Auth::id())
                            ->where('id', $id)
                            ->first();

        if(!empty($result))
        {
            return $result;
        }    
        
        return false; 
    }
}
<?php

namespace App\Action\QuizResult;

use App\Models\Assessment\Option;
use App\Models\Assessment\Quiz;
use App\Models\Assessment\QuizResult;

class CreateQuizResult
{

    public function execute($quizId, $request)
    {
        $quiz = Quiz::find($quizId);

        if(!empty($quiz))
        {
            $result = QuizResult::Create([
                'student_id' => $request['student_id'],
                'quiz_id' => $quizId,
                'score' => 0
            ]);

            
            foreach($request['answers'] as $answer)
            {
                $answer = Option::where('question_id', $answer['question_id'])
                                ->where('id', $answer['answer_id'])
                                ->first();
                
                if($answer->is_correct)
                {
                    $result->score++;
                    $result->save();
                }
                
            }

            return true;

        }

        return false;
    }
}
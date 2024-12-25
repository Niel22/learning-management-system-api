<?php

namespace App\Action\Question;

use Illuminate\Support\Str;
use App\Models\Assessment\Quiz;

class CreateQuestion{

    public function execute($quizId, $request)
    {
        
        $quiz = Quiz::find($quizId);

        if(!empty($quiz))
        {
            $request['slug'] = Str::slug($request['question']);
            $question = $quiz->question()->create($request);

            if($question)
            {
                return true;
            }
        }

        return false;
    }
}
<?php

namespace App\Action\Question;

use Illuminate\Support\Str;
use App\Models\Assessment\Question;

class UpdateQuestion{

    public function execute($quizId, $id, $request)
    {
        $request['slug'] = Str::slug($request['question']);
        $question = Question::where('quiz_id', $quizId)
                            ->where('id', $id)
                            ->first();
                    
        if(!empty($question))
        {
            return $question->update($request);
        }
        return false;
    }
}
<?php

namespace App\Action\Quiz;

use Illuminate\Support\Str;
use App\Models\Assessment\Quiz;

class UpdateQuiz{

    public function execute($courseId, $id, $request)
    {
        $request['slug'] = Str::slug($request['title']);
        $quiz = Quiz::where('course_id', $courseId)
                    ->where('id', $id)
                    ->first();

        if(!empty($quiz))
        {
            return $quiz->update($request);
        }
        return false;
    }
}
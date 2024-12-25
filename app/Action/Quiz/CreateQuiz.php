<?php

namespace App\Action\Quiz;

use Illuminate\Support\Str;
use App\Models\Course\Course;

class CreateQuiz{

    public function execute($courseId, $request)
    {
        $request['slug'] = Str::slug($request['title']);
        $course = Course::find($courseId);

        if(!empty($course))
        {
            $quiz = $course->quiz()->create($request);

            if($quiz)
            {
                return true;
            }
        }

        return false;
    }
}
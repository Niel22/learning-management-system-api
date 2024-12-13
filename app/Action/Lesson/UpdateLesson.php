<?php

namespace App\Action\Lesson;

use App\Models\Lesson;
use Illuminate\Support\Str;

class UpdateLesson{

    public function execute($id, $request){
        $lesson = Lesson::find($id);

        $request['slug'] = Str::slug($request['title']);
        if(!empty($lesson)){
            return $lesson->update($request);
        }

        return false;
    }
}
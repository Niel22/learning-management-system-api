<?php

namespace App\Action\Lesson;

use App\Models\Lesson;
use Illuminate\Support\Str;

class CreateLesson{

    public function execute($request){

        $request['slug'] = Str::slug($request['title']);
        $lesson = Lesson::create($request);

        if($lesson){
            return true;
        }

        return false;
    }
}
<?php

namespace App\Action\Content;

use App\Models\Course\Content;



class FetchAllContent{

    public function execute($lessonId){

        $content = Content::with('lesson')->where('lesson_id', $lessonId)->paginate(10);

        if($content->isNotEmpty()){
            return $content;
        }

        return false;
    }
}
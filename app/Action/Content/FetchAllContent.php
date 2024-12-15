<?php

namespace App\Action\Content;

use App\Models\Content;

class FetchAllContent{

    public function execute(){

        $content = Content::with('lesson')->paginate(10);

        if($content->isNotEmpty()){
            return $content;
        }

        return false;
    }
}
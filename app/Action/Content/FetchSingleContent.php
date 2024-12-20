<?php

namespace App\Action\Content;

use App\Helpers\ModelFinder;
use App\Models\Content;

class FetchSingleContent{

    public function execute($lessonId, $id)
    {
        $content = ModelFinder::findBySlugOrId($id, new Content(), 'lesson_id', $lessonId);

        if(!empty($content))
        {
            return $content;
        }

        return false;
    }
}
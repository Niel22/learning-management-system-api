<?php

namespace App\Action\Content;

use App\Helpers\ModelFinder;
use App\Models\Course\Content;

class FetchSingleContent{

    public function execute($lessonId, $id)
    {
        $content = ModelFinder::findBySlugOrId($id, new Content(), ['lesson'], 'lesson_id', $lessonId);

        if(!empty($content))
        {
            return $content;
        }

        return false;
    }
}
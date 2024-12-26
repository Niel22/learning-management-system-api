<?php

namespace App\Action\Option;

use App\Helpers\ModelFinder;
use App\Models\Assessment\Option;

class FetchSingleOption{

    public function execute($questionId, $id)
    {
        $option = ModelFinder::findBySlugOrId($id, new Option(), ['question'], 'question_id', $questionId);

        if(!empty($option))
        {
            return $option;
        }
        return false;
    }
}
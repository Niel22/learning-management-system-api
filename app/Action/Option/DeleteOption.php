<?php

namespace App\Action\Option;

use App\Models\Assessment\Option;

class DeleteOption{

    public function execute($questionId, $id)
    {
        $option = Option::where('question_id', $questionId)
                        ->find($id);

        if(!empty($option))
        {
            return $option->delete();
        }
        return false;
    }
}
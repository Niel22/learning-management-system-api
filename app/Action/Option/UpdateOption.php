<?php

namespace App\Action\Option;

use App\Models\Assessment\Option;

class UpdateOption{

    public function execute($questionId, $id, $request)
    {
        $option = Option::where('question_id', $questionId)
                        ->find($id);
                
        if(!empty($option))
        {
            return $option->update($request);
        }
        return false;
    }
}
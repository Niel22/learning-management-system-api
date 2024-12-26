<?php

namespace App\Action\Option;

use App\Models\Assessment\Option;

class FetchAllOption{

    public function execute($questionId)
    {
        $option = Option::with('question')
                        ->where('question_id', $questionId)
                        ->get();
                    
        if($option->isNotEmpty())
        {
            return $option;
        }

        return false;
    }
}
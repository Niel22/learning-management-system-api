<?php

namespace App\Action\Option;

use App\Models\Assessment\Question;

class CreateOption{

    public function execute($questionId, $request)
    {
        
        $question = Question::find($questionId);

        if(!empty($question))
        {
            $created = false;
            
            foreach($request['options'] as $option){

                $option = $question->option()->create($option);

                if($option)
                {
                    $created = true;
                }
            }

            return $created;
        }
    }
}
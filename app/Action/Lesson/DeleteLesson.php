<?php

namespace App\Action\Lesson;

use App\Helpers\UploadHelper;
use App\Models\Course\Lesson;



class DeleteLesson{

    protected $action;

    public function __construct(UploadHelper $action)
    {
        $this->action = $action;
    }
    
    public function execute($moduleId, $id){
        $lesson = Lesson::where('module_id', $moduleId)->where('id', $id)->first();

        if(!empty($lesson)){
            $this->action->remove($lesson->file);

            return $lesson->delete();
        }

        return false;
    }
}
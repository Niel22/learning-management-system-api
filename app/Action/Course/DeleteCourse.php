<?php

namespace App\Action\Course;

use App\Helpers\UploadHelper;
use App\Models\Course\Course;



class DeleteCourse{

    protected $action;

    public function __construct(UploadHelper $action)
    {
        $this->action = $action;
    }

    
    public function execute($id){

        $course = Course::find($id);

        if(!empty($course)){
            $this->action->remove($course->thumbnail);
            return $course->delete();
        }

        return false;
    }
}
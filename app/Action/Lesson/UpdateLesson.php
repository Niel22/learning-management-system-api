<?php

namespace App\Action\Lesson;

use Illuminate\Support\Str;
use App\Helpers\UploadHelper;
use App\Models\Course\Lesson;

class UpdateLesson{

    protected $action;

    public function __construct(UploadHelper $action)
    {
        $this->action = $action;
    }
    
    public function execute($moduleId, $id, $request){
        $lesson = Lesson::where('module_id', $moduleId)->where('id', $id)->first();

        
        if(!empty($lesson)){
            $request['slug'] = Str::slug($request['title']);
            if(isset($request['file'])){
                $this->action->remove($lesson->file);
    
                $request['file'] = $this->action->upload($request['slug'], $request['file'], 'course_content/');
            }
            return $lesson->update($request);
        }

        return false;
    }
}
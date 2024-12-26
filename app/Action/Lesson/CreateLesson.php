<?php

namespace App\Action\Lesson;

use Illuminate\Support\Str;
use App\Helpers\UploadHelper;
use App\Models\Course\Module;

class CreateLesson{

    protected $action;

    public function __construct(UploadHelper $action)
    {
        $this->action = $action;
    }

    public function execute($moduleId, $request){

        $module = Module::find($moduleId);
        
        if(!empty($module)){
            
            $request['slug'] = Str::slug($request['title']);
            $request['file'] = $this->action->upload($request['slug'], $request['file'], 'module_content/');
            $lesson = $module->lesson()->create($request);
            
            if($lesson){
                return true;
            }
        }

        return false;
    }
}
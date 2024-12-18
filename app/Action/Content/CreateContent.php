<?php

namespace App\Action\Content;

use App\Models\Lesson;
use Illuminate\Support\Str;
use App\Helpers\UploadHelper;

class CreateContent{

    protected $action;

    public function __construct(UploadHelper $action)
    {
        $this->action = $action;
    }

    public function execute($request){

        $lesson = Lesson::find($request['lesson_id']);
        
        if(!empty($lesson)){
            
            $request['slug'] = Str::slug($request['title']);
            $request['file'] = $this->action->upload($request['slug'], $request['file'], 'course_content/');

            $content = $lesson->content()->create($request);

            if($content){
                return true;
            }
        }

        return false;


    }
}
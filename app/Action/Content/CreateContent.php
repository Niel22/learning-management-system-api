<?php

namespace App\Action\Content;

use Illuminate\Support\Str;
use App\Helpers\UploadHelper;
use App\Models\Course\Lesson;

class CreateContent{

    protected $action;

    public function __construct(UploadHelper $action)
    {
        $this->action = $action;
    }

    public function execute($lessonId, $request){

        $lesson = Lesson::find($lessonId);

        
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
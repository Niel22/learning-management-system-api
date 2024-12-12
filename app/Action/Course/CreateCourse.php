<?php

namespace App\Action\Course;

use Illuminate\Support\Str;
use App\Helpers\UploadHelper;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CreateCourse{

    protected $action;

    public function __construct(UploadHelper $action)
    {
        $this->action = $action;
    }

    public function execute($request){
        
        $request['slug'] = Str::slug($request['title']);

        $request['thumbnail'] = $this->action->upload($request['slug'], $request['thumbnail'], 'course_thumbnails/');

        $user = Auth::user();
        $course = $user->course()->create($request);

        if($course){
            return true;
        }

        return false;
    }
}
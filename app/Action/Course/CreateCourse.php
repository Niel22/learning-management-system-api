<?php

namespace App\Action\Course;

use Illuminate\Support\Str;
use App\Helpers\UploadHelper;
use App\Models\User;
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

        $request['instructor_id'] = Auth::id();
        $user = User::find($request['instructor_id']);

        if(!empty($user)){

            $course = $user->course()->create($request);
            
            if($course){
                return true;
            }
        }

        return false;
    }
}
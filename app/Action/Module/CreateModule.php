<?php

namespace App\Action\Module;

use Illuminate\Support\Str;
use App\Models\Course\Course;

class CreateModule{

    public function execute($courseId, $request)
    {
        $course = Course::find($courseId);

        if(!empty($course))
        {
            $request['slug'] = Str::slug($request['title']);
            return $course->module()->create($request);
        }
        return false;
    }
}
<?php

namespace App\Action\Module;

use App\Models\Course\Course;
use App\Models\Course\Module;

class FetchAllModule{

    public function execute($courseId)
    {
        $module = Module::with('course')->where('course_id', $courseId)->paginate(10);

        if($module->isNotEmpty())
        {
            return $module;
        }
        return false;
    }
}
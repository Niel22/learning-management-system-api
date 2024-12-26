<?php

namespace App\Action\Module;

use App\Models\Course\Module;

class DeleteModule{

    public function execute($courseId, $id)
    {
        $module = Module::where('course_id', $courseId)
                        ->find($id);

        if(!empty($module))
        {
            return  $module->delete();
        }
        return false;
    }
}
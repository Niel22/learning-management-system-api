<?php

namespace App\Action\Module;

use App\Helpers\ModelFinder;
use App\Models\Course\Module;

class FetchSingleModule{

    public function execute($courseId, $id)
    {
        $module = ModelFinder::findBySlugOrId($id, new Module(), ['course'], 'course_id', $courseId);

        if(!empty($module))
        {
            return $module;
        }
        return false;
    }
}
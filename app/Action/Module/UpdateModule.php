<?php

namespace App\Action\Module;

use Illuminate\Support\Str;
use App\Models\Course\Module;

class UpdateModule{

    public function execute($courseId, $id, $request)
    {
        $module = Module::where('course_id', $courseId)
                        ->find($id);

        if(!empty($module))
        {
            $request['slug'] = Str::slug($request['title']);
            return $module->update($request);
        }
        return false;
    }
}
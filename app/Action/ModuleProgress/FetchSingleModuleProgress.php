<?php

namespace App\Action\ModuleProgress;

use App\Models\Progress\ModuleProgress;


class FetchSingleModuleProgress
{
    public function execute($moduleId, $id)
    {
        $progress = ModuleProgress::where('module_id', $moduleId)->find($id);

        if(!empty($progress))
        {
            return $progress;
        }
        
        return false;
    }
}
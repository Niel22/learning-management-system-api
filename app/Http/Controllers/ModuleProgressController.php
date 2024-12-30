<?php

namespace App\Http\Controllers;

use App\Trait\ApiResponse;
use App\Http\Controllers\Controller;
use App\Action\ModuleProgress\TrackModuleProgress;
use App\Action\ModuleProgress\FetchModuleProgress;
use App\Http\Resources\ModuleProgress\ModuleProgressResource;

class ModuleProgressController extends Controller
{
    use ApiResponse;

    public function index($studentId, $courseId, $moduleId, FetchModuleProgress $action)
    {
        if($progress = $action->execute($studentId, $courseId, $moduleId))
        {
            return $this->success(new ModuleProgressResource($progress));
        }
        return $this->error('You havent started this lesson');
    }

    public function store($studentId, $courseId, $moduleId, TrackModuleProgress $action)
    {
        if($action->execute($studentId, $courseId, $moduleId))
        {
            return $this->success([], 'Progress Updated');
        }

        return $this->error('Problem updating progress');
    }
}

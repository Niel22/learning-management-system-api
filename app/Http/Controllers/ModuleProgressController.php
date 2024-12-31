<?php

namespace App\Http\Controllers;

use App\Trait\ApiResponse;
use App\Http\Controllers\Controller;
use App\Action\ModuleProgress\FetchModuleProgress;
use App\Action\ModuleProgress\FetchSingleModuleProgress;
use App\Action\ModuleProgress\TrackModuleProgress;
use App\Http\Requests\Progress\ModuleProgressRequest;
use App\Http\Resources\ModuleProgress\ModuleProgressCollection;
use App\Http\Resources\ModuleProgress\ModuleProgressResource;

class ModuleProgressController extends Controller
{
    use ApiResponse;

    public function index($moduleId, FetchModuleProgress $action)
    {
        if($progress = $action->execute($moduleId))
        {
            return $this->success(new ModuleProgressCollection($progress));
        }
        return $this->error('You havent started this lesson');
    }

    public function store($moduleId, ModuleProgressRequest $request, TrackModuleProgress $action)
    {
        if($action->execute($moduleId, $request->all()))
        {
            return $this->success([], 'Progress Updated');
        }

        return $this->error('Problem updating progress');
    }

    public function show($moduleId, $id, FetchSingleModuleProgress $action)
    {
        if($result = $action->execute($moduleId, $id))
        {
            return $this->success(new ModuleProgressResource($result));
        }

        return $this->error('Progress not found');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Trait\ApiResponse;
use App\Action\Module\CreateModule;
use App\Action\Module\DeleteModule;
use App\Action\Module\UpdateModule;
use App\Http\Controllers\Controller;
use App\Action\Module\FetchAllModule;
use App\Action\Module\FetchSingleModule;
use App\Http\Resources\Module\ModuleResource;
use App\Http\Resources\Module\ModuleCollection;
use App\Http\Requests\Module\CreateModuleRequest;
use App\Http\Requests\Module\UpdateModuleRequest;

class ModuleController extends Controller
{
    use ApiResponse;

    public function index($courseId, FetchAllModule $action)
    {
        if($module = $action->execute($courseId))
        {
            return $this->success(new ModuleCollection($module));        
        }
        return $this->error('No module found');
    }

    public function store($courseId, CreateModuleRequest $request, CreateModule $action)
    {
        if($action->execute($courseId, $request->all()))
        {
            return $this->success([], 'Module Created');
        }
        return $this->error('Cannot create module');
    }

    public function show($courseId, $id, FetchSingleModule $action)
    {
        if($module = $action->execute($courseId, $id))
        {
            return $this->success(new ModuleResource($module));
        }
        return $this->error('Module not found');
    }

    public function update($courseId, $id, UpdateModuleRequest $request, UpdateModule $action)
    {
        if($action->execute($courseId, $id, $request->all()))
        {
            return $this->success([], 'Module Updated');
        }
        return $this->error('Cannot update module');
    }

    public function destroy($courseId, $id, DeleteModule $action)
    {
        if($action->execute($courseId, $id))
        {
            return $this->success([], 'Module Deleted');
        }
        return $this->error('Cannot delete module');
    }


}

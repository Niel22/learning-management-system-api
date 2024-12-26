<?php

namespace App\Http\Controllers\Admin;

use App\Action\Option\CreateOption;
use App\Action\Option\DeleteOption;
use App\Action\Option\FetchAllOption;
use App\Action\Option\FetchSingleOption;
use App\Action\Option\UpdateOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Option\CreateOptionRequest;
use App\Http\Requests\Option\UpdateOptionRequest;
use App\Trait\ApiResponse;

class OptionController extends Controller
{
    use ApiResponse;

    public function index($questionId, FetchAllOption $action)
    {
        if($option = $action->execute($questionId))
        {
            return $this->success($option);
        }
        return $this->error('No option find');
    }

    public function store($questionId, CreateOptionRequest $request, CreateOption $action)
    {
        if($action->execute($questionId, $request->all()))
        {
            return $this->success([], 'Option created');
        }

        return $this->error('Cannot create option');
    }

    public function show($questionId, $id, FetchSingleOption $action)
    {
        if($option = $action->execute($questionId, $id))
        {
            return $this->success($option);
        }
        return $this->error('Option not found');
    }

    public function update($questionId, $id, UpdateOptionRequest $request, UpdateOption $action)
    {
        if($action->execute($questionId, $id, $request->all()))
        {
            return $this->success([], 'Option Updated');
        }
        return $this->error('Cannot update option');
    }

    public function destroy($questionId, $id, DeleteOption $action)
    {
        if($action->execute($questionId, $id))
        {
            return $this->success([], 'Option Deleted');
        }

        return false;
    }
}

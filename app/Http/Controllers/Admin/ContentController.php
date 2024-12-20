<?php

namespace App\Http\Controllers\Admin;

use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Action\Content\CreateContent;
use App\Action\Content\DeleteContent;
use App\Action\Content\UpdateContent;
use App\Action\Content\FetchAllContent;
use App\Action\Content\FetchSingleContent;
use App\Http\Resources\Content\ContentResource;
use App\Http\Resources\Content\ContentCollection;
use App\Http\Requests\Content\CreateContentRequest;
use App\Http\Requests\Content\UpdateContentRequest;

class ContentController extends Controller
{
    use ApiResponse;

    public function index($lessonId, FetchAllContent $action)
    {
        if($content = $action->execute($lessonId))
        {
            return $this->success(new ContentCollection($content));
        }

        return $this->error('No Content Found');
    }

    public function store($lessonId, CreateContentRequest $request, CreateContent $action){

        if($action->execute($lessonId, $request->all())){
            return $this->success([], 'Content Created');
        }

        return $this->error('Cannot create content for this lesson');
    }

    public function show($lessonId, $id, FetchSingleContent $action)
    {
        if($content = $action->execute($lessonId, $id))
        {
            return $this->success(new ContentResource($content));
        }

        return $this->error('Content Not found');
    }

    public function update($lessonId, $id, UpdateContentRequest $request, UpdateContent $action)
    {
        if($action->execute($lessonId, $id, $request->all()))
        {
            return $this->success([], 'Content Updated');
        }

        return $this->error('Cannot update content');
    }

    public function destroy($lessonId, $id, DeleteContent $action)
    {
        if($action->execute($lessonId, $id))
        {
            return $this->success([], 'Content Delete');
        }

        return $this->error('Cannot Delete Content');
    }
}

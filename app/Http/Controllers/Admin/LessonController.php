<?php

namespace App\Http\Controllers\Admin;

use App\Action\Lesson\CreateLesson;
use App\Action\Lesson\DeleteLesson;
use App\Action\Lesson\FetchAllLesson;
use App\Action\Lesson\FetchSingleLesson;
use App\Action\Lesson\UpdateLesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lesson\CreateLessonRequest;
use App\Http\Requests\Lesson\UpdateLessonRequest;
use App\Http\Resources\Lesson\LessonCollection;
use App\Http\Resources\Lesson\LessonResource;
use App\Trait\ApiResponse;

class LessonController extends Controller
{
    use ApiResponse;

    public function index($courseId, FetchAllLesson $action){

        if($lesson = $action->execute($courseId)){
            return $this->success(new LessonCollection($lesson));
        }

        return $this->error('No Lesson Found');
    }

    public function store($courseId, CreateLessonRequest $request, CreateLesson $action){
        if($action->execute($courseId, $request->all())){
            return $this->success([], 'Lesson Created');
        }

        return $this->error('Cannot Create Lesson');
    }

    public function show($courseId, $id, FetchSingleLesson $action){

        if($lesson = $action->execute($courseId, $id)){
            return $this->success(new LessonResource($lesson));
        }

        return $this->error('Lesson not Found');
    }

    public function update($courseId, $id, UpdateLessonRequest $request, UpdateLesson $action){
        if($action->execute($courseId, $id, $request->all())){
            return $this->success([], 'Lesson Updated');
        }

        return $this->error('Cannot Update Lesson');
    }

    public function destroy($courseId, $id, DeleteLesson $action){
        if($action->execute($courseId, $id)){
            return $this->success([], 'Lesson Deleted');
        }

        return $this->error('Cannot Delete Lesson');
    }
}

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

    public function index(FetchAllLesson $action){

        if($lesson = $action->execute()){
            return $this->success(new LessonCollection($lesson));
        }

        return $this->error('No Lesson Found');
    }

    public function store(CreateLessonRequest $request, CreateLesson $action){
        if($action->execute($request->all())){
            return $this->success([], 'Lesson Created');
        }

        return $this->error('Cannot Create Lesson');
    }

    public function show($id, FetchSingleLesson $action){

        if($lesson = $action->execute($id)){
            return $this->success(new LessonResource($lesson));
        }

        return $this->error('Lesson not Found');
    }

    public function update($id, UpdateLessonRequest $request, UpdateLesson $action){
        if($action->execute($id, $request->all())){
            return $this->success([], 'Lesson Updated');
        }

        return $this->error('Cannot Update Lesson');
    }

    public function destroy($id, DeleteLesson $action){
        if($action->execute($id)){
            return $this->success([], 'Lesson Deleted');
        }

        return $this->error('Cannot Delete Lesson');
    }
}

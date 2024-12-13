<?php

namespace App\Http\Controllers\Admin;

use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use App\Action\Course\CreateCourse;
use App\Action\Course\DeleteCourse;
use App\Action\Course\UpdateCourse;
use App\Http\Controllers\Controller;
use App\Action\Course\FetchAllCourse;
use App\Action\Course\FetchSingleCourse;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Course\CourseCollection;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;

class CourseController extends Controller
{
    use ApiResponse;

    public function index(FetchAllCourse $action){
        if($courses = $action->execute()){
            return $this->success(new CourseCollection($courses));
        }

        return $this->error('No Course found');
    }

    public function store(CreateCourseRequest $request, CreateCourse $action){

        if($action->execute($request->all())){
            return $this->success([], 'course created');
        }

        return $this->error('Cannot create course');
    }

    public function show($id, FetchSingleCourse $action){
        if($course = $action->execute($id)){
            return $this->success(new CourseResource($course));
        }

        return $this->error('Course Not Found');
    }

    public function update($id, UpdateCourseRequest $request, UpdateCourse $action){

        if($action->execute($id, $request->all())){
            return $this->success([], 'Course Updated');
        }

        return $this->error('Cannot Update Course');
    }

    public function destroy($id, DeleteCourse $action){
        if($action->execute($id)){
            return $this->success([], 'Course Deleted');
        }

        return $this->error('Cannot Delete Course');
    }
}

<?php

namespace App\Http\Controllers;

use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use App\Action\Course\CreateCourse;
use App\Action\Course\FetchAllCourse;
use App\Http\Resources\Course\CourseCollection;
use App\Http\Requests\Course\CreateCourseRequest;

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
}

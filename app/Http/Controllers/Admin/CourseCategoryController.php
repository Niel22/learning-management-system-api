<?php

namespace App\Http\Controllers\Admin;

use App\Trait\ApiResponse;
use App\Action\Course\DeleteCourse;
use App\Action\Course\UpdateCourse;
use App\Http\Controllers\Controller;
use App\Action\CourseCategory\CreateCategory;
use App\Action\CourseCategory\DeleteCategory;
use App\Action\CourseCategory\FetchAllCategory;
use App\Action\CourseCategory\FetchSingleCategory;
use App\Http\Resources\CourseCategory\CourseCategoryResource;
use App\Http\Resources\CourseCategory\CourseCategoryCollection;
use App\Http\Requests\CourseCategory\CreateCourseCategoryRequest;
use App\Http\Requests\CourseCategory\UpdateCourseCategoryRequest;

class CourseCategoryController extends Controller
{
    use ApiResponse;

    public function index(FetchAllCategory $action){

        if($category = $action->execute()){
            return $this->success(new CourseCategoryCollection($category));
        }

        return $this->error('No Category Found');
    }

    public function show($id, FetchSingleCategory $action){

        if($category = $action->execute($id)){
            return $this->success(new CourseCategoryResource($category));
        }

        return $this->error('Category not found');
    }

    public function store(CreateCourseCategoryRequest $request, CreateCategory $action){

        if($action->execute($request->all())){
            return $this->success([], 'Course Category Created');
        }

        return $this->error('Cannot Create Course Caegory');
    }

    public function update($id, UpdateCourseCategoryRequest $request, UpdateCourse $action){
        if($action->execute($id, $request->all())){
            return $this->success([], 'Course Updated');
        }

        return $this->error('Cannot Update Course');
    }

    public function destroy($id, DeleteCategory $action)
    {
        if($action->execute($id)){
            return $this->success([], 'Course Deleted');
        }

        return $this->error('Cannot Delete Course');
    }
}

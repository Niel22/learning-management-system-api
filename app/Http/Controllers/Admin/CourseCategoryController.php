<?php

namespace App\Http\Controllers\Admin;

use App\Action\CourseCategory\CreateCategory;
use App\Action\CourseCategory\FetchAllCategory;
use App\Action\CourseCategory\FetchSingleCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCategory\CreateCourseCategoryRequest;
use App\Http\Resources\CourseCategory\CourseCategoryCollection;
use App\Http\Resources\CourseCategory\CourseCategoryResource;
use App\Trait\ApiResponse;

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
}

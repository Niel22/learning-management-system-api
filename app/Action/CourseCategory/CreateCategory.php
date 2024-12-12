<?php

namespace App\Action\CourseCategory;

use App\Models\CourseCategory;
use Illuminate\Support\Str;

class CreateCategory{

    public function execute($request){

        $request['slug'] = Str::slug($request['name']);
        $category = CourseCategory::create($request);

        if($category){
            return true;
        }

        return false;
    }
}
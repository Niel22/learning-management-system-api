<?php

namespace App\Action\CourseCategory;

use App\Models\CourseCategory;

class FetchAllCategory{

    public function execute(){

        $category = CourseCategory::with('course')->paginate(10);

        if($category->isNotEmpty()){
            return $category;
        }

        return false;
    }
}
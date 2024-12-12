<?php

namespace App\Action\CourseCategory;

use App\Models\CourseCategory;

class FetchAllCategory{

    public function execute(){

        $category = CourseCategory::paginate(10);

        if($category->isNotEmpty()){
            return $category;
        }

        return false;
    }
}
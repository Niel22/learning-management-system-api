<?php

namespace App\Action\CourseCategory;

use App\Models\CourseCategory;

class FetchSingleCategory{

    public function execute($id){

        $category = CourseCategory::find($id);

        if(!empty($category)){
            return $category;
        }

        return false;
    }
}
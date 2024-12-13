<?php

namespace App\Action\CourseCategory;

use App\Models\CourseCategory;

class DeleteCategory{

    public function execute($id){
        $category = CourseCategory::find($id);

        if(!empty($category)){
            return $category->delete();
        }

        return false;
    }
}
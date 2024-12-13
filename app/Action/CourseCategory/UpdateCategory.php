<?php

namespace App\Action\CourseCategory;

use App\Models\CourseCategory;

class UpdateCategory{

    public function execute($id, $request){

        $category = CourseCategory::find($id);

        if(!empty($category)){
            return $category->update($request);
        }

        return false;
    }
}
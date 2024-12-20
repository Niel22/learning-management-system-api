<?php

namespace App\Action\CourseCategory;

use App\Helpers\ModelFinder;
use App\Models\CourseCategory;

class FetchSingleCategory{

    public function execute($id){

        $category = ModelFinder::findBySlugOrId($id, new CourseCategory());

        if(!empty($category)){
            return $category;
        }

        return false;
    }
}
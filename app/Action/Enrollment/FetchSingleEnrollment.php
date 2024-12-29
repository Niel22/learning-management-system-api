<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;
use App\Helpers\ModelFinder;
use Illuminate\Support\Facades\Auth;

class FetchSingleEnrollment
{
    public function execute($id)
    {
        $enrollment = ModelFinder::findBySlugOrId($id, new Enrollment(), ['course', 'student'], 'student_id', Auth::id());

        if (!empty($enrollment)) {
            return $enrollment;
        }

        return false;
    }
}

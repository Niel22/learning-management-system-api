<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;
use App\Helpers\ModelFinder;
use Illuminate\Support\Facades\Auth;

class FetchSingleEnrollment
{
    public function execute($studentId, $id)
    {
        if (Auth::id() == $studentId) {

            $enrollment = ModelFinder::findBySlugOrId($id, new Enrollment(), 'student_id', $studentId);

            if (!empty($enrollment)) {
                return $enrollment;
            }
        }

        return false;
    }
}

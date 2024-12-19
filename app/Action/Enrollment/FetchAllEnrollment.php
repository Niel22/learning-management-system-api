<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;

class FetchAllEnrollment
{
    public function execute()
    {
        $enrollment = Enrollment::with('course', 'student')->paginate();

        if($enrollment->isNotEmpty())
        {
            return $enrollment;
        }
        return false;
    }
}
<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;

class FetchSingleEnrollment
{
    public function execute($id)
    {
        $enrollment = Enrollment::with('course', 'student')->find($id);

        if(!empty($enrollment))
        {
            return $enrollment;
        }

        return false;
    }
}
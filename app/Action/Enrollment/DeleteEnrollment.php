<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;

class DeleteEnrollment
{
    public function execute($id)
    {
        $enrollment = Enrollment::find($id);

        if(!empty($enrollment))
        {
            return $enrollment->delete();
        }

        return false;
    }
}
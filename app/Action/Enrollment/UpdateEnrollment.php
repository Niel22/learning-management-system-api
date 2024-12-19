<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;

class UpdateEnrollment
{
    public function execute($id, $status)
    {
        $enrollment = Enrollment::find($id);

        if(!empty($enrollment))
        {
            return $enrollment->update([
                'status' => $status
            ]);
        }

        return false;
    }
}
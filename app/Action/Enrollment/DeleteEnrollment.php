<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class DeleteEnrollment
{
    public function execute($id)
    {
        $enrollment = Enrollment::find($id);

        if (!empty($enrollment)) {

            if ($enrollment->student_id == Auth::id()) {

                return $enrollment->delete();
            }
        }

        return false;
    }
}

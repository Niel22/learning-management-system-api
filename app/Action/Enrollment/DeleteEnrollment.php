<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class DeleteEnrollment
{
    public function execute($id)
    {
        $enrollment = Enrollment::where('student_id', Auth::id())->find($id);

            if (!empty($enrollment)) {
                return $enrollment->delete();
            }

        return false;
    }
}

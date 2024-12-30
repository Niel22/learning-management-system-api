<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class DeleteEnrollment
{
    public function execute($studentId, $id)
    {
        if (Auth::id() == $studentId) {
            $enrollment = Enrollment::find($id);
            if (Auth::id() == $enrollment->student_id) {

                if (!empty($enrollment)) {
                    return $enrollment->delete();
                }
            }
        }

        return false;
    }
}

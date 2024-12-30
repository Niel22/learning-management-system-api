<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class FetchAllEnrollment
{
    public function execute($studentId)
    {
        if (Auth::id() == $studentId) {
            $enrollment = Enrollment::with('course', 'student')->where('student_id', $studentId)->paginate();

            if ($enrollment->isNotEmpty()) {
                return $enrollment;
            }
        }
        return false;
    }
}

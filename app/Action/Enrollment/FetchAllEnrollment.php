<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class FetchAllEnrollment
{
    public function execute()
    {
        $enrollment = Enrollment::with('course', 'student')->where('student_id', Auth::id())->paginate();

        if ($enrollment->isNotEmpty()) {
            return $enrollment;
        }
        return false;
    }
}

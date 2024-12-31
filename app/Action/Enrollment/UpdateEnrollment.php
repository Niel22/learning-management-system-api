<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class UpdateEnrollment
{
    public function execute($id, $request)
    {
        $enrollment = Enrollment::where('student_id', Auth::id())->find($id);


        if (!empty($enrollment)) {
            return $enrollment->update([
                'status' => $request['status']
            ]);
        }

        return false;
    }
}

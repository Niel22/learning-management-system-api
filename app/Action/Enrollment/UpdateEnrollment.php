<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class UpdateEnrollment
{
    public function execute($id, $request)
    {
        $enrollment = Enrollment::find($id);

        if (!empty($enrollment)) {
            if ($enrollment->student_id == Auth::id() && $request['student_id'] == Auth::id()) {

                return $enrollment->update([
                    'status' => $request['status']
                ]);
            }
        }

        return false;
    }
}

<?php

namespace App\Action\Enrollment;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class UpdateEnrollment
{
    public function execute($studentId, $id, $request)
    {
        if (Auth::id() == $studentId) {
        $enrollment = Enrollment::find($id);

        if(!empty($enrollment))
        {
            return $enrollment->update([
                'status' => $request['status']
            ]);
        }
    }

        return false;
    }
}
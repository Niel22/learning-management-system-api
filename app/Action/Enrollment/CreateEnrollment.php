<?php

namespace App\Action\Enrollment;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateEnrollment
{

    public function execute($request)
    {
        
            
            $request['enrolled_at'] = now();
            $user = User::find(Auth::id());

            if (!empty($user)) {
                $enrollment = $user->enrollment()->create($request);

                if ($enrollment) {
                    return true;
                }
            }
        return false;
    }
}

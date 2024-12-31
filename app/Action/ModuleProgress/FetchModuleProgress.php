<?php

namespace App\Action\ModuleProgress;

use Illuminate\Support\Facades\Auth;
use App\Models\Progress\ModuleProgress;



class FetchModuleProgress
{
    public function execute($moduleId)
    {
        $progress = ModuleProgress::with('student', 'course', 'module')->where('student_id', Auth::id())
                                    ->paginate(10);
                                    
        if($progress->isNotEmpty())
        {
            return $progress;
        }

        return false;
    }
}
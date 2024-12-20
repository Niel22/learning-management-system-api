<?php

namespace App\Http\Controllers;

use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Action\LessonProgress\FetchLessonProgress;
use App\Action\LessonProgress\TrackLessonProgress;
use App\Http\Resources\LessonProgress\LessonProgressResource;

class LessonProgressController extends Controller
{
    use ApiResponse;

    public function index($studentId, $courseId, $lessonId, FetchLessonProgress $action)
    {
        if($progress = $action->execute($studentId, $courseId, $lessonId))
        {
            return $this->success(new LessonProgressResource($progress));
        }
        return $this->error('You havent started this lesson');
    }

    public function store($studentId, $courseId, $lessonId, TrackLessonProgress $action)
    {
        if($action->execute($studentId, $courseId, $lessonId))
        {
            return $this->success([], 'Progress Updated');
        }

        return $this->error('Problem updating progress');
    }
}

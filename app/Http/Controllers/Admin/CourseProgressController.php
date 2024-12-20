<?php

namespace App\Http\Controllers;

use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Action\CourseProgress\FetchCourseProgress;
use App\Action\CourseProgress\TrackCourseProgress;
use App\Http\Resources\CourseProgress\CourseProgressResource;

class CourseProgressController extends Controller
{
    use ApiResponse;

    public function index($studentId, $courseId, FetchCourseProgress $action)
    {
        if($progress = $action->execute($studentId, $courseId))
        {
            return $this->success(new CourseProgressResource($progress));
        }

        return $this->error('You dont have any progress on this course yet');
    }

    public function store($studentId, $courseId, TrackCourseProgress $action)
    {
        if($action->execute($studentId, $courseId))
        {
            return $this->success([], 'Progress Updated');
        }

        return $this->error('Problem Updating progress');
    }
}

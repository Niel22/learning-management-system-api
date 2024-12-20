<?php

namespace App\Http\Controllers;

use App\Action\Enrollment\CreateEnrollment;
use App\Action\Enrollment\DeleteEnrollment;
use App\Action\Enrollment\FetchAllEnrollment;
use App\Action\Enrollment\FetchSingleEnrollment;
use App\Action\Enrollment\UpdateEnrollment;
use App\Http\Requests\Enrollment\CompleteEnrollmentRequest;
use App\Http\Requests\Enrollment\EnrollmentRequest;
use App\Http\Resources\Enrollment\EnrollmentCollection;
use App\Http\Resources\Enrollment\EnrollmentResource;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    use ApiResponse;

    public function index($studentId, FetchAllEnrollment $action)
    {
        if($enrollment = $action->execute($studentId, $studentId))
        {
            return $this->success(new EnrollmentCollection($enrollment));
        }

        return $this->error('No enrollement Found');
    }

    public function store($studentId, EnrollmentRequest $request, CreateEnrollment $action)
    {
        if($action->execute($studentId, $request->all()))
        {
            return $this->success([], 'Student Enrolled');
        }

        return $this->error('Cannot Enroll student');
    }

    public function update($studentId, $id, CompleteEnrollmentRequest $request, UpdateEnrollment $action)
    {
        if($action->execute($studentId, $id, $request->all()))
        {
            return $this->success([], 'Enrolled Course Completed');
        }

        return $this->error('Enrolled course not found');
    }

    public function show($studentId, $id, FetchSingleEnrollment $action)
    {
        if($enrollment = $action->execute($studentId, $id))
        {
            return $this->success(new EnrollmentResource($enrollment));
        }

        return $this->error('Enrollment Not Found');
    }

    public function destroy($studentId, $id, DeleteEnrollment $action)
    {
        if($action->execute($studentId, $id))
        {
            return $this->success([], 'Enrollment Deleted');
        }

        return $this->error('Enrollment Not found');
    }
}

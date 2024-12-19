<?php

namespace App\Http\Controllers;

use App\Action\Enrollment\CreateEnrollment;
use App\Action\Enrollment\DeleteEnrollment;
use App\Action\Enrollment\FetchAllEnrollment;
use App\Action\Enrollment\FetchSingleEnrollment;
use App\Http\Requests\Enrollment\EnrollmentRequest;
use App\Http\Resources\Enrollment\EnrollmentCollection;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    use ApiResponse;

    public function index(FetchAllEnrollment $action)
    {
        if($enrollment = $action->execute())
        {
            return $this->success(new EnrollmentCollection($enrollment));
        }

        return $this->error('No enrollement Found');
    }

    public function store(EnrollmentRequest $request, CreateEnrollment $action)
    {
        if($action->execute($request->all()))
        {
            return $this->success([], 'Student Enrolled');
        }

        return $this->error('Cannot Enroll student');
    }

    public function show($id, FetchSingleEnrollment $action)
    {
        if($enrollment = $action->execute($id))
        {
            return $this->success($enrollment);
        }

        return $this->error('Enrollment Not Found');
    }

    public function destroy($id, DeleteEnrollment $action)
    {
        if($action->execute($id))
        {
            return $this->success([], 'Enrollment Deleted');
        }

        return $this->error('Enrollment Not found');
    }
}

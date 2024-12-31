<?php

namespace App\Http\Controllers;

use App\Action\QuizResult\CreateQuizResult;
use App\Action\QuizResult\FetchQuizResult;
use App\Action\QuizResult\FetchSingleResult;
use App\Http\Requests\QuizResult\CreateQuizResultRequest;
use App\Http\Resources\QuizResult\QuizResultCollection;
use App\Http\Resources\QuizResult\QuizResultResource;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    use ApiResponse;

    public function index($quizId, FetchQuizResult $action)
    {
        if($result = $action->execute($quizId))
        {
            return $this->success(new QuizResultCollection($result));
        }
        return $this->error('No result found for this user');
    }

    public function  store($quizId, CreateQuizResultRequest $request, CreateQuizResult $action)
    {
        if($action->execute($quizId, $request->all()))
        {
            return $this->success([], 'Quiz Submitted');
        }
        return $this->error('Problem Submitting Quiz');
    }

    public function show($quizId, $id, FetchSingleResult $action)
    {
        if($result = $action->execute($quizId, $id))
        {
            return $this->success(new QuizResultResource($result));
        }

        return $this->error('No result found for this user');
    }
}

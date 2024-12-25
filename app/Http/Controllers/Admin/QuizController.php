<?php

namespace App\Http\Controllers\Admin;

use App\Action\Quiz\CreateQuiz;
use App\Action\Quiz\DeleteQuiz;
use App\Action\Quiz\FetchAllQuiz;
use App\Action\Quiz\FetchSingleQuiz;
use App\Action\Quiz\UpdateQuiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\CreateQuizRequest;
use App\Http\Requests\Quiz\UpdateQuizRequest;
use App\Trait\ApiResponse;

class QuizController extends Controller
{
    use ApiResponse;

    public function index($courseId, FetchAllQuiz $action)
    {
        if($quiz = $action->execute($courseId))
        {
            return $this->success($quiz);
        }
        return $this->error('No Quiz Found for this course');
    }

    public function store($courseId, CreateQuizRequest $request, CreateQuiz $action)
    {
        if($action->execute($courseId, $request->all()))
        {
            return $this->success([], 'Quiz created for this course');
        }

        return false;
    }

    public function show($courseId, $id, FetchSingleQuiz $action)
    {
        if($quiz = $action->execute($courseId, $id))
        {
            return $this->success($quiz);
        }
        return $this->error('Quiz not found');
    }

    public function update($courseId, $id, UpdateQuizRequest $request, UpdateQuiz $action)
    {
        if($action->execute($courseId, $id, $request->all()))
        {
            return $this->success([], 'Quiz updated');
        }
        return $this->error('Cannot Update Quiz');
    }

    public function destroy($courseId, $id, DeleteQuiz $action)
    {
        if($action->execute($courseId, $id))
        {
            return $this->success([], 'Quiz Deleted');
        }

        return $this->error('Cannot delete Quiz');
    }
}

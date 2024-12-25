<?php

namespace App\Http\Controllers\Admin;

use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use App\Action\Quiz\DeleteQuiz;
use App\Http\Controllers\Controller;
use App\Action\Question\CreateQuestion;
use App\Action\Question\DeleteQuestion;
use App\Action\Question\UpdateQuestion;
use App\Action\Question\FetchAllQuestion;
use App\Action\Question\FetchSingleQuestion;
use App\Http\Resources\Question\QuestionCollection;
use App\Http\Requests\Question\CreateQuestionRequest;
use App\Http\Requests\Question\UpdateQuestionRequest;
use App\Http\Resources\Question\QuestionResource;

class QuestionController extends Controller
{
    use ApiResponse;

    public function index($quizId, FetchAllQuestion $action)
    {
        if($question = $action->execute($quizId))
        {
            return $this->success(new QuestionCollection($question));
        }

        return $this->error('No Question find for this course');
    }

    public function store($quizId, CreateQuestionRequest $request, CreateQuestion $action)
    {
        if($action->execute($quizId, $request->all()))
        {
            return $this->success([], 'Question created');
        }
        return $this->error('Cannot create question');
    }

    public function show($quizId, $id, FetchSingleQuestion $action)
    {
        if($question = $action->execute($quizId, $id))
        {
            return $this->success(new QuestionResource($question));
        }
        return $this->error('Question not found');
    }

    public function update($quizId, $id, UpdateQuestionRequest $request, UpdateQuestion $action)
    {
        if($action->execute($quizId, $id, $request->all()))
        {
            return $this->success([], 'Question Update');
        }
        return $this->error('Cannot Update Question');
    }

    public function destroy($quizId, $id, DeleteQuestion $action)
    {
        if($action->execute($quizId, $id))
        {
            return $this->success([], 'Question deleted');
        }

        return $this->error('Cannot delete Question');
    }
}

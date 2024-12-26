<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\CourseProgressController;
use App\Http\Controllers\LessonProgressController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\OptionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){

    Route::apiResource('course-category', CourseCategoryController::class);
    Route::apiResource('course', CourseController::class);
    Route::apiResource('course.module', ModuleController::class);
    Route::apiResource('module.lesson', LessonController::class);
    Route::apiResource('student.enrollment', EnrollmentController::class);
    Route::apiResource('student.course.lesson.progress', LessonProgressController::class)->only('index', 'store');
    Route::apiResource('student.course.progress', CourseProgressController::class)->only('index', 'store');
    Route::apiResource('course.quiz', QuizController::class);
    Route::apiResource('quiz.question', QuestionController::class);
    Route::apiResource('question.option', OptionController::class);
});
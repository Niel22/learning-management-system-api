<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\CourseProgressController;
use App\Http\Controllers\LessonProgressController;
use App\Http\Controllers\Admin\CourseCategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'create']);
Route::post('login', [AuthController::class, 'store']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout', [AuthController::class, 'destroy']);
    
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





Route::get('/send-test-email', function () {
    Mail::raw('This is a test email from your Laravel project!', function ($message) {
        $message->to('niel2264@gmail.com')
                ->subject('Test Email');
    });

    return 'Test email has been sent!';
});
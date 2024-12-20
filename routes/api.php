<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\EnrollmentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){

    Route::apiResource('course-category', CourseCategoryController::class);
    Route::apiResource('course', CourseController::class);
    Route::apiResource('course.lesson', LessonController::class);
    Route::apiResource('lesson.content', ContentController::class);
    Route::apiResource('student.enrollment', EnrollmentController::class);
});
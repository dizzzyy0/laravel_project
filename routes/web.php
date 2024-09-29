<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
use App\Http\Controllers\ProgrammingLanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProgressController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RecommendationController;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\Check_Name;

Route::get('/', function () {
    $data = ['name' => 'dizzzyy', 'role' => 'Creator'];
        return view('welcome', $data);
});

Route::get('/lab1', [LabController::class, 'index']);
Route::get('/about', [LabController::class, 'about'])->middleware(CheckAge::class);
Route::get('/contact', [LabController::class, 'contact']);
Route::get('/hobbies', [LabController::class, 'hobbies'])->middleware(Check_Name::class);


Route::resource('ProgrammingLanguage', ProgrammingLanguageController::class);
Route::resource('user', UserController::class);
Route::resource('course', CourseController::class);
Route::resource('lesson', LessonController::class);
Route::resource('question', QuestionController::class);
Route::resource('quiz', QuizController::class);
Route::resource('recommendation', RecommendationController::class);
Route::resource('userProgress', UserProgressController::class);
Route::resource('answer', AnswerController::class);

<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
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
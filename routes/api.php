<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->group(function () {
    Route::resource('students', API\StudentController::class);
    Route::resource('grades', API\GradeController::class);
});

Route::group(['namespace' => 'API'], function()
{
    // Controllers Within The "App\Http\Controllers\API" Namespace

    Route::post('register', 'UserController@register')->name('register');
    Route::post('login', 'UserController@login');

    Route::post('restore/{grade}', 'GradeController@restore');
    Route::get('count/{grade}', 'GradeController@countStudentInGrade');
    Route::get('allstudents', 'GradeController@allClassStudent');
    Route::get('showgrade/{grade}', 'GradeController@showStudentInGrade');

    Route::get('countstudents', 'StudentController@countStudent')->name('countStudent');
});

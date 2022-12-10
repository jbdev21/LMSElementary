<?php

use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\StudentAPIController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("lesson/list", [LessonController::class, 'list']);
Route::get("student/search", [StudentAPIController::class, 'search']);
Route::post("student/add-to-module", [StudentAPIController::class, 'addStudentToModule']);

<?php

use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Student\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'student', 'as' => 'student.'], function(){
    Route::get("/home", [HomeController::class, 'index'])->name("home");
});



Route::group(['prefix' => 'dashboard'], function(){
    Route::get("/home", [DashboardHomeController::class, 'index'])->name("dashboard");
});

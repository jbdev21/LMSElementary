<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\DashboardMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'student', 'as' => 'student.', 'middleware' => ['auth']], function(){
    Route::get("/home", [HomeController::class, 'index'])->name("home");
});


Route::group([
        'prefix' => 'dashboard',
        'as' => 'dashboard.',
        'middleware' => [
                // Authenticate::class,
                // DashboardMiddleware::class,
            ]
    ], function(){

    Route::get("/home", [DashboardHomeController::class, 'index'])->name("dashboard");
    Route::resource("category", CategoryController::class);
    
});

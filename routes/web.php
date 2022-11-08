<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\DashboardMiddleware;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Dashboard\ModuleController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Student\ModuleController as StudentModuleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'student', 'as' => 'student.', 'middleware' => ['auth']], function(){
    Route::get("/home", [HomeController::class, 'index'])->name("home");
    Route::resource("module", StudentModuleController::class);
});


Route::group([
        'prefix' => 'dashboard',
        'as' => 'dashboard.',
        'middleware' => [
                Authenticate::class,
                DashboardMiddleware::class,
            ]
    ], function(){

    Route::get("/home", [DashboardHomeController::class, 'index'])->name("dashboard");
    Route::resource("category", CategoryController::class);
    Route::post("module/{module}/upload-file", [ModuleController::class, 'uploadFile'])->name("module.upload-file");
    Route::resource("module", ModuleController::class);
    Route::resource("student", StudentController::class);
    Route::resource("section", SectionController::class);

    Route::get('profile', [ProfileController::class, 'index'])->name("profile.index");
    Route::put('profile', [ProfileController::class, 'update'])->name("profile.update");
    
    Route::post("file/upload", [FileController::class, 'upload'])->name("file.upload");
    Route::post("file/upload-module-file", [FileController::class, 'uploadModuleFile'])->name("file.upload.module.file");
});

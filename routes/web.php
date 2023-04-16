<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\DashboardMiddleware;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Dashboard\ModuleController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Dashboard\LessonController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\QuarterController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Student\AssessmentController;
use App\Http\Controllers\Student\ModuleController as StudentModuleController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/failed', function () {
    return view("student.assessment.passed");
});

Auth::routes();


Route::group(['prefix' => 'student', 'as' => 'student.', 'middleware' => ['auth']], function(){
    Route::get("/home", [HomeController::class, 'index'])->name("home");
    Route::resource("module", StudentModuleController::class);
    
    // Essay
    Route::get("assessment/{module}/passed/{examination}", [AssessmentController::class, 'passedAssessment'])->name("assessment.passed");
    Route::get("assessment/{module}/failed/{examination}", [AssessmentController::class, 'failedAssessment'])->name("assessment.failed");
     Route::post('/assessment/{code}/stop', [AssessmentController::class, 'stop'])->name('assessment.stop');
     Route::get('/assessment/{code}/result',[ AssessmentController::class, 'result'])->name('assessment.result');
     Route::get('/assessment/{code}/question', [AssessmentController::class, 'question'])->name('assessment.question');
     Route::post('/assessment/question/answer', [AssessmentController::class, 'answerQuestion'])->name('assessment.question.answer');
     Route::resource('/assessment', AssessmentController::class);

    Route::get('profile', [StudentProfileController::class, 'index'])->name("profile.index");
    Route::put('profile', [StudentProfileController::class, 'update'])->name("profile.update");
    Route::get("file/download/{id}", [FileController::class, 'download'])->name("file.download");
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
    Route::post("module/{module}/detach-user", [ModuleController::class, 'removeStudentFromModule'])->name("module.detach-user");
    Route::get("module/{module}/export-students", [ModuleController::class, 'exportCsv'])->name("module.export.student.csv");
    Route::resource("module", ModuleController::class);
    Route::post("lesson/{lesson}/add-file", [LessonController::class, 'addFile'])->name("lesson.file.addfile");
    Route::delete("lesson/{id}/delete-file", [LessonController::class, 'deleteFile'])->name("lesson.file.deletefile");
    Route::post("lesson/{lesson}/add-link", [LessonController::class, 'addLink'])->name("lesson.addlink");
    Route::delete("lesson/{id}/delete-link", [LessonController::class, 'deleteLink'])->name("lesson.deletelink");
    Route::resource("lesson", LessonController::class);
    Route::resource("question", QuestionController::class);
    Route::resource("student", StudentController::class);
    Route::resource("quarter", QuarterController::class);
    Route::resource("section", SectionController::class);
    Route::resource("user", UserController::class);

    Route::get('profile', [ProfileController::class, 'index'])->name("profile.index");
    Route::put('profile', [ProfileController::class, 'update'])->name("profile.update");
    
    
    Route::post("file/upload", [FileController::class, 'upload'])->name("file.upload");
    Route::post("file/upload-module-file", [FileController::class, 'uploadModuleFile'])->name("file.upload.module.file");
    Route::get("file/download/{id}", [FileController::class, 'download'])->name("file.download");
    Route::delete("file/delete/{id}", [FileController::class, 'destroyMedia'])->name("file.destroy");
});


Route::post("file/upload-tiny-mce", [FileController::class, 'tinyMCEUpload'])->name("file.upload.tiny.mce");
Route::get("media/{number}/{file}", function($number, $file){
    $path = public_path("media/$number/$file");

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    function list(Request $request){
        $query =  Lesson::query();

        if($request->module){
            $query->where("module_id", $request->module);
        }
        
        return $query->get(); 
    }
}

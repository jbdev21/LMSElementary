<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentAPIController extends Controller
{
    function search(Request $request){
        return Student::search($request->q)
                ->take(10)
                ->get()
                ->map(function($q){
                    return [
                        'id' => $q->id,
                        'first_name' => $q->first_name,
                        'middle_name' => $q->middle_name,
                        'last_name' => $q->last_name,
                        'section' => optional($q->section)->name,
                    ];
                });
    }
    
    function addStudentToModule(Request $request){
        $this->validate($request,[
            'student' => ['required', 'exists:users,id'],
            'module' => ['required', 'exists:modules,id'],
        ]);

        $student = User::find($request->student);
        $module = Module::find($request->module);

        if($module->users()->where("users.id", $request->student)->exists()){
            return response()
                ->json(['message' => $student->first_name . " is added"], 200);
        }

        $module->users()->attach($student);
        return response()
                    ->json(['message' => $student->first_name . " is added"], 200);
    }
}

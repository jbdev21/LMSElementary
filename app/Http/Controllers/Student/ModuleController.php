<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Examination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
  
    public function index(Request $request)
    {
        //auth user module
        // $modules = Auth::user()->modules()->paginate();
        $modules = Module::withCount(['questions', 'lessons'])
                    ->addSelect(DB::raw('
                       (SELECT COUNT(*) FROM examinations 
                        WHERE examinations.module_id = modules.id 
                        AND examinations.is_passed = 1
                        AND user_id = ' . $request->user()->id .') as is_passed 
                    '))  
                    ->orderBy("name")
                    ->paginate(25);

        return view("student.module.index", [
            'modules' => $modules
        ]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

 
    public function show(Request $request, Module $module)
    {
        $examinationResult = Examination::where("module_id", $module->id)
                        ->where("user_id", $request->user()->id)
                        ->where("is_passed", 1)
                        ->first();

        if(!$examinationResult){
            // if(!$examinationResult->is_passed){
                flash()->warning("Please take assessment first before you can access the module. Thanks");
                return back();
            // }
        }
        // else{
        //     flash()->warning("Please take assessment first before you can access the module. Thanks");
        //     return back();
        // }
        $files = $module->getMedia('files');
        $assessments = Examination::where("module_id", $module->id)
                        ->select("*")
                        ->addSelect(DB::raw("(SELECT COUNT(*) FROM questions WHERE questions.module_id = examinations.module_id) as questions_count"))
                        ->latest()
                        ->get();

        return view('student.module.show', [
            'assessments' => $assessments,
            'module' => $module,
            'files' => $files
        ]);
    }

    public function edit(Module $module)
    {
        //
    }

 
    public function update(Request $request, Module $module)
    {
        //
    }

  
    public function destroy(Module $module)
    {
        //
    }
}

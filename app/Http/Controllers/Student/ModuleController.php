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
                       (SELECT examinations.is_passed FROM examinations 
                        WHERE examinations.module_id = modules.id 
                        AND user_id = ' . $request->user()->id .' LIMIT 1) as is_passed 
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
                        ->first();

        if($examinationResult){
            if(!$examinationResult->is_passed){
                flash()->warning("Please take assessment first before you can access the module. Thanks");
                return back();
            }
        }else{
            flash()->warning("Please take assessment first before you can access the module. Thanks");
            return back();
        }
        $files = $module->getMedia('files');


        return view('student.module.show', [
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

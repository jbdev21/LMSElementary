<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
  
    public function index(Request $request)
    {
        //auth user module
        $modules = Auth::user()->modules()->paginate();

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

 
    public function show(Module $module)
    {
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

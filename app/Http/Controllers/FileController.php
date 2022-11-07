<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class FileController extends Controller
{
    function uploadModuleFile(Request $request){
        $module = Module::findOrFail($request->module_id);
        $item = $module->addMediaFromRequest('file')
                ->toMediaCollection('files');

        if($request->name) {
            $item->file_name = $request->name;
            $item->save();
        }
        
        flash()->success("File uploaded");
        return back();
    }
}

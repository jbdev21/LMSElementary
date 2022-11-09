<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FileController extends Controller
{
    function uploadModuleFile(Request $request){
        $type =  $request->file('file')->getClientOriginalExtension();
        $module = Module::findOrFail($request->module_id);
        $item = $module->addMediaFromRequest('file')
                ->toMediaCollection('files');
                
        if($request->name) {
            $item->file_name = $request->name . '.' . $type;
            $item->save();
        }
        
        flash()->success("File uploaded");
        return back();
    }


    public function download($id){
        $mediaItem = Media::where("id", $id)->first();
        return $mediaItem;
   }


    function destroyMedia($id){
        Media::where("id", $id)->delete();
        flash()->success("File deleted!");
        return back();
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'module_id' => ['required', 'exists:modules,id'],
            'name'  => ['required']
        ]);

        
        $lesson = new Lesson();
        $lesson->module_id = $request->module_id;
        $lesson->name = $request->name;
        $lesson->minimum_score = $request->minimum_score;
        
        $lesson->save();
        
        if($request->hasFile("file")){   
            $item = $lesson->addMediaFromRequest('file')
                ->toMediaCollection('lesson');
        }
        
        // if ($request->name) {
        //     $type =  $request->file('file')->getClientOriginalExtension();
        //     $item->file_name = $request->name . '.' . $type;
        //     $item->save();
        // }

        flash()->success("Lesson added");
        return back();
    }

    function addFile(Lesson $lesson){
        $lesson->addMediaFromRequest('file')
                ->toMediaCollection('lesson');

        flash()->success("File Added");
        return back();
    }

    function deleteFile($id){
        Media::find($id)->delete();
        flash()->success("File deleted!");
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);

        $lesson->delete();

        flash()->success("Lesson deleted successfully");
        return back();
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\File;
use App\Models\Module;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modules = Module::query()
            ->when($request->q, function ($query) use ($request) {
                $query->where("name", "LIKE", $request->q . "%");
            })
            ->paginate();


        $categories = Category::all();

        return view("dashboard.module.index", [
            'modules' => $modules,
            'categories' => $categories
        ]);
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
            'name' => ['required'],
        ]);

        $module = new Module;
        $module->name = $request->name;
        $module->user_id = $request->user()->id;
        $module->category_id = $request->category_id;
        $module->save();

        $file = new File;
        $file->name = $request->file('file')->getClientOriginalName();;
        $file->path = $request->file->store('file', 'public'); 
        $file->filable_type = Module::class; 
        $file->filable_id = $module->id; 

        $file->save();

        flash()->success("Module added successfuly");

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();

        return back();
    }
}

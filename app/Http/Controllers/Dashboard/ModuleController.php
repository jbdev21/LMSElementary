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
            ->when($request->category, function ($query) use ($request) {
                $query->where("category_id", $request->category);
            })
            ->paginate(25);

        $categories = Category::whereType("module")->get();

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

        flash()->success("Module added successfuly");

        return redirect()->route("dashboard.module.show", $module->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Module $module)
    {
        $module->load('users');
        $categories = Category::whereType("module")->get();
        $files = $module->getMedia('files');
        $users = $module->users;

        return view("dashboard.module.show",[ 
            'users' => $users,
            'module' => $module,
            'categories' => $categories,
            'files' => $files,
        ]);
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
        flash()->success("Module deleted!");
        return back();
    }
}

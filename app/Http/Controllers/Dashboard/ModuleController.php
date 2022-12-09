<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\File;
use App\Models\Module;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Quarter;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

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
            ->when($request->quarter, function ($query) use ($request) {
                $query->where("quarter_id", $request->quarter);
            })
            ->withCount("users")
            ->paginate(25);

        $categories = Category::whereType("module")->get();
        $quarters = Quarter::all();

        return view("dashboard.module.index", [
            'modules' => $modules,
            'categories' => $categories,
            'quarters' => $quarters
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
        $module->quarter_id = $request->quarter_id;
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
        $categories = Category::whereType("module")->get();
        $quarters = Quarter::all();

        switch ($request->tab) {
            case "files":
                $files = $module->getMedia('files');
                return view("dashboard.module.show.files", [
                    'files' => $files,
                    'module' => $module,
                    'categories' => $categories,
                    'quarters' => $quarters,
                ]);
                break;
            case "lesson":
                $module->load('lessons');

                $lessons = Lesson::query()
                                    ->select("*")
                                    ->withAlert()
                                    ->where("module_id", $module->id)
                                    ->get();
                return view("dashboard.module.show.lesson", [
                    'lessons' => $lessons,
                    'module' => $module,
                    'quarters' => $quarters,
                    'categories' => $categories
                ]);
                break;
            case "assessment":
                $module->load('questions');
                $questions = $module->questions()->orderBy("order")->get();
                return view("dashboard.module.show.pre-assessment", [
                    'module' => $module,
                    'categories' => $categories,
                    'quarters' => $quarters,
                    'questions' => $questions,
                ]);
                break;

            default:
                $module->load('users');
                $users = $module->users;
                return view("dashboard.module.show.student", [
                    'users' => $users,
                    'module' => $module,
                    'categories' => $categories,
                    'quarters' => $quarters,
                ]);
        }
    }

    function removeStudentFromModule(Request $request, Module $module)
    {
        $module->users()->detach($request->student);
        flash()->success("Student had been dettached");
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
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
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $module->name = $request->name;
        $module->user_id = $request->user()->id;
        $module->category_id = $request->category_id;
        $module->quarter_id = $request->quarter_id;
        $module->details = $request->details;
        $module->save();

        flash()->success("Module updated successfuly");
        return back();
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

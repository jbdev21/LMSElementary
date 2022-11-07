<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
 
    public function index(Request $request)
    {
        $sections = Section::query()
            ->when($request->q, function ($query) use ($request) {
                $query->where("name", "LIKE", $request->q . "%");
            })
            ->paginate();

        return view("dashboard.section.index", [
            'sections' => $sections
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sections|max:255'
        ]);

        Section::create($request->except("_token"));
        flash()->success("Section added successfuly");

        return back();
    }

    public function show(Section $section)
    {

        return view('dashboard.section.show', [
            'section' => $section,
        ]);
    }

    public function edit(Section $section)
    {

        return view('dashboard.section.edit', [
            'section' => $section,
        ]);
    }

  
    public function update(Request $request, Section $section)
    {
        $section->name = $request->name;
        $section->save();

        flash()->success("Section updated successfuly");

        return redirect()->route('dashboard.section.index');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        flash()->error("Section deleted successfuly");

        return back();
    }
}

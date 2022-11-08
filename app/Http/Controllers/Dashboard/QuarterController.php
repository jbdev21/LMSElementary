<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Quarter;
use Illuminate\Http\Request;

class QuarterController extends Controller
{
    
    public function index(Request $request)
    {
        $quarters = Quarter::query()
            ->when($request->q, function ($query) use ($request) {
                $query->where("name", "LIKE", $request->q . "%");
            })
            ->orderBy("name")
            ->paginate();

        return view("dashboard.quarter.index", [
            'quarters' => $quarters
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:quarters|max:255',
            'year' => ['required']
        ]);

        Quarter::create($request->except("_token"));
        flash()->success("Quarter added successfuly");

        return back();
    }

    public function show(Quarter $quarter)
    {

        return view('dashboard.quarter.show', [
            'section' => $quarter,
        ]);
    }

    public function edit(Quarter $quarter)
    {
        return view('dashboard.quarter.edit', [
            'section' => $quarter,
        ]);
    }

  
    public function update(Request $request, Quarter $quarter)
    {
        $quarter->name = $request->name;
        $quarter->year = $request->year;
        $quarter->save();

        flash()->success("Quarter updated successfuly");

        return redirect()->route('dashboard.quarter.index');
    }

    public function destroy(Quarter $quarter)
    {
        $quarter->delete();
        flash()->error("Quarter deleted successfuly");

        return back();
    }
}

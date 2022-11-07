<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::query()
                    ->when($request->q, function ($query) use ($request) {
                        $query->where("last_name", "LIKE", $request->q . "%")
                            ->orWhere("first_name", "LIKE", $request->q. "%")
                            ->orWhere("address", "LIKE", $request->q . "%");
                    })
                    ->paginate();

        return view("dashboard.student.index", [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();

        return view("dashboard.student.create", [
            'sections' => $sections
        ]);
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
            'username' => 'required|unique:users|max:255',
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
        ]);

        $student = new Student;
        $student->last_name = $request->last_name;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->email = $request->email;
        $student->contact_number = $request->contact_number;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->section_id = $request->section_id;
        $student->username = $request->username;
        $student->password = Hash::make($request->password);

        $student->save();

        //upload image using spatie media
        $student->addMediaFromRequest('photo')->toMediaCollection('thumbnail');

        flash()->success("New Student Added Successfuly");

        return redirect()->route('dashboard.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('dashboard.student.show', [
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $sections = Section::all();
        return view("dashboard.student.edit", [
            'student' => $student,
            'sections' => $sections
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sections  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->last_name = $request->last_name;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->email = $request->email;
        $student->contact_number = $request->contact_number;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->username = $request->username;
        $student->section_id = $request->section_id;
        
        if($request->has('password')){
            $student->password = Hash::make($request->password);
        }
        $student->save();

        if($request->has('photo')){
            $student->clearMediaCollection('thumbnail');
            $student->addMediaFromRequest('photo')->toMediaCollection('thumbnail');
        }

        flash()->success("Student information update successfuly");

        return redirect()->route('dashboard.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        flash()->error("Student deleted successfully");

        return back();
    }
}

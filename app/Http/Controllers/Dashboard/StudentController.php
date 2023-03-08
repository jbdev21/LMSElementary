<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Examination;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        if($request->q){
            $students = User::where(function($q) use ($request){
                            $q->where("first_name", "LIKE", '%'. $request->q . '%')
                                ->orWhere("middle_name", "LIKE", '%'. $request->q . '%')
                                ->orWhere("last_name", "LIKE", '%'. $request->q . '%');
                        })
                        ->where("type", 'student')
                        ->paginate();
        }else{
            $students = User::query()
                        ->where("type", 'student')
                        ->paginate();
        }

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

        if($request->has("thumbnail")){
            //upload image using spatie media
            $student->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }

        flash()->success("New Student Added Successfuly");

        return redirect()->route('dashboard.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $student)
    {
        $assessments = Examination::where("user_id", $student->id)
                        ->select("*")
                        ->addSelect(DB::raw("(SELECT COUNT(*) FROM questions WHERE questions.module_id = examinations.module_id) as questions_count"))
                        ->with(['user', 'module'])
                        ->has("user")
                        ->has("module")
                        ->latest()
                        ->get();

        return view('dashboard.student.show', [
            'student' => $student,
            'assessments' => $assessments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
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
    public function update(Request $request, User $student)
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

        if ($request->password) {
            $student->password = Hash::make($request->password);
        }
        $student->save();

        if ($request->thumbnail) {
            $student->clearMediaCollection('thumbnail');
            $student->addMediaFromRequest('thumbnail')
            ->toMediaCollection('thumbnail');
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
        $student->examninations()->delete();
        $student->delete();

        flash()->error("Student deleted successfully");

        return back();
    }
}

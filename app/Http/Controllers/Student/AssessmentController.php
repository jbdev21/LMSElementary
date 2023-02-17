<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Examination;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mockery\CountValidator\Exact;

class AssessmentController extends Controller
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

        $module = Module::find($request->module_id);
        $questions = Question::find($request->question_id);

        //clear the prev examination
        // $existingExam = Examination::where("module_id", $module->id)->where("user_id", $request->user()->id)->first();
        // if ($existingExam) {
        //     Answer::where("examination_id", $existingExam->id)->delete();
        //     $existingExam->delete();
        // }

        //generate Examination
        $examination =  Examination::create([
            'user_id' => request()->user()->id,
            'module_id'   => $module->id,
        ]);

        $correct = 0;
        $correctAnswer = [];
        $wrongQuestionIDs = [];

        foreach ($questions as $question) {
            // checking for correct answer
            if ($question->answer == $question->options[request('answer-' . $question->id)]) {
                array_push($correctAnswer, $question);
                $correct = 1;
            } else {
                array_push($wrongQuestionIDs, $question->id);
                $correct = 0;
            }

            Answer::create([
                'user_id' => Auth::user()->id,
                'examination_id' => $examination->id,
                'question_id' => $question->id,
                'answer' => request('answer-' . $question->id),
                'correct' => $correct
            ]);
        }

        $examination->score = count($correctAnswer);

        if (count($correctAnswer) >= $module->assesstment_passing_score) {

            $examination->is_passed = 1;
            $examination->save();
            return redirect()->route("student.assessment.passed", [$module, $examination]);
            
        } else {
            // Get all lessons in wrong answered questions
            $lessonsPlucked = Lesson::find(Question::find($wrongQuestionIDs)->pluck('lesson_id'));

            //get lesson that is weak
            $weakLessonIds = [];
            foreach ($lessonsPlucked as $lesson) {
                if (Question::whereIn("id", $wrongQuestionIDs)->where("lesson_id", $lesson->id)->count() >= $lesson->minimum_score) {
                    array_push($weakLessonIds, $lesson->id);
                }
            }

            // $weakLessonIds = Lesson::whereIn('id', Question::whereIn("id", $wrongQuestionIDs)->pluck('lesson_id'))
            //     ->whereRaw('(SELECT COUNT(*) FROM questions WHERE questions.lesson_id = lessons.id AND questions.id IN (' . implode(",", $wrongQuestionIDs) . ')) >= minimum_score')
            //     ->pluck('id')
            //     ->toArray();

            $examination->is_passed = 0;
            $examination->save();
            return redirect()->route("student.assessment.failed",  [$module, $examination, 'ref' => json_encode($weakLessonIds)]);
        }
    }

    function passedAssessment(Request $request, Module $module, Examination $examination)
    {
        return view("student.assessment.passed", compact("module", "examination"));
    }

    function failedAssessment(Request $request, Module $module, Examination $examination)
    {
        $lessons = Lesson::whereIn("id", json_decode($request->ref))->with(['links'])->get();
        $files = $module->getMedia('files');
        return view("student.assessment.failed", compact("module", 'files', 'lessons', 'examination'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $module = Module::with('questions')->find($id);
        $questions = $module->questions()->when($request->type == "retake", function ($q) {
            $q->inRandomOrder();
        })->get();
        return view("student.question.index", compact("module", "questions"));
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
        //
    }





    function question(Request $request, $code)
    {
        $module = Module::whereId($code)->firstOrFail();
        if ($module->questions()->count() < 1) {
            flash()->warning('No question on that assessment');
            return back();
        }
        Session::forget('time');

        if (Session::has('examination')) {
            $examination = Examination::find(Session::get('examination'));
        } else {
            Examination::where("module_id", $module->id)->where("user_id", $request->user()->id)->delete();
            $examination = $this->generateExamination($module);
        }

        $answered = $examination->answers();

        $count = $module->questions()->count();

        if (!$examination->moduleCompleted($module->id)) {
            $question = $module->questions()->whereNotIn('id', $answered->pluck('question_id'))
                ->inRandomOrder()
                ->first();
        }

        if ($request->ajax()) {
            if (!$examination->moduleCompleted($module->id)) {
                return array(
                    'question' =>  [
                        'answer' => $question->answer,
                        'body' => $question->body,
                        'created_at' => $question->created_at,
                        'id' => $question->id,
                        'lesson_id' => $question->lesson_id,
                        'module_id' => $question->module_id,
                        'options' => $question->options,
                        'order' => $question->order,
                        'type' => 'multiple'
                    ],
                    'questions_count' => $module->questions()->count(),
                    'answered' => $answered->count() + 1,
                );
            } else {
                return response()->json(['message' => 'answer saved', 'status' => 'done', 'body' => ''], 200);
            }
        } else {
            if ($examination->moduleCompleted($module->id)) {
                $id = Session::pull('examination');
                Session::forget('time');
                return redirect()->route('student.assessment.result', $id);
            }
        }

        if (Session::get('time')) {
            $time = Session::get('time.0');
        } else {
            $time =  date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . '+' . $module->duration . 'minutes'));
            Session::push('time', $time);
        }

        return view('student.assessment.question', compact('module', 'question', 'time'));
    }


    function generateExamination(Module $module)
    {
        $examination =  Examination::create([
            'user_id' => request()->user()->id,
            'module_id'   => $module->id,
        ]);

        Session::put('examination', $examination->id);

        return $examination;
    }


    function answerQuestion(Request $request)
    {

        $question = Question::find($request->question_id);

        // $correct = $question->answer == $request->answer ? 1 : 0;
        $correct = $question->checkForCorrect($request->answer) ? 1 : 0;

        $result = new Answer;
        $result->user_id = $request->user()->id;
        $result->examination_id = Session::get('examination');
        $result->question_id = $request->question_id;
        $result->answer = $request->answer;
        $result->correct = $correct;
        $result->save();

        if ($request->ajax()) {
            return $result;
        } else {
            return back();
        }
    }

    public function result($code)
    {
        Session::forget('examination');
        $examination = Examination::find($code);
        $module = $examination->module;
        $questions = $examination->module->questions;
        $examination->is_passed = $examination->moduleScore("correct") >= $module->assesstment_passing_score;
        $examination->save();
        return view('student.assessment.result', compact('module', 'questions', 'examination'));
    }

    public function stop(Request $request, $code)
    {
        $examination = Examination::find(Session::pull('examination'));
        Session::forget('time');
        $module = Module::whereId($code)->firstOrFail();

        $answered = $examination->answers()->whereHas('question', function ($q) use ($module) {
            $q->whereQuizId($module->id);
        })->get();

        if (!$examination->moduleCompleted($module->id)) {
            $questions = $module->questions()->whereNotIn('id', $answered->pluck('question_id'))->get();
        }

        foreach ($questions as $question) {
            $result = new Answer;
            $result->user_id = $request->user()->id;
            $result->question_id = $question->id;
            $result->examination_id = $examination->id;
            $result->answer = '';
            $result->correct = 0;
            $result->save();
        }

        return redirect()->route('student.assessment.result', $examination->id);
    }
}

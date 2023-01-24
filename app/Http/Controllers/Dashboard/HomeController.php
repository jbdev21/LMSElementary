<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Examination;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $studentsCount = User::whereType("student")->count();
        $modulesCount = Module::count();
        $examinationCounts = Examination::count();

        $users = User::select('users.*')
                                    ->addSelect(DB::raw("(SELECT COUNT(*) FROM examinations WHERE examinations.user_id=users.id AND is_passed = 1) as passedItems"))
                                    ->addSelect(DB::raw("(SELECT COUNT(*) FROM examinations WHERE examinations.user_id=users.id AND is_passed = 0) as failedItems"))
                                    ->addSelect(DB::raw("(SELECT examinations.created_at FROM examinations WHERE examinations.user_id=users.id AND is_passed = 0 ORDER BY created_at DESC LIMIT 1) as last_taken_date"))
                                    ->orderByRaw("last_taken_date DESC")
                                    ->has("examinations")
                                    ->latest()
                                    ->limit(15)
                                    ->get();
        return view('dashboard.index', compact("studentsCount", 'modulesCount', 'examinationCounts', 'users'));
    }
}

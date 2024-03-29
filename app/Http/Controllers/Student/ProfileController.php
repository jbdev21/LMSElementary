<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);

        return view('student.profile.index', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->contact_number = $request->contact_number;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

      
        if ($request->thumbnail) {
            $user->clearMediaCollection('thumbnail');
            $user->addMediaFromRequest('thumbnail')
            ->toMediaCollection('thumbnail');
        }

        flash()->success("Profile update successfuly");

        return back();
    }
}

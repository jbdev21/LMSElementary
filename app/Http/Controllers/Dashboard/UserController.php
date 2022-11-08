<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereType('teacher')->paginate();

        return view('dashboard.user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->contact_number = $request->contact_number;
        $user->type = 'teacher';

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if ($request->has('thumbnail')) {
            $user->clearMediaCollection('thumbnail');
            $user->addMediaFromRequest('thumbnail')
            ->toMediaCollection('thumbnail');
        }

        flash()->success("Added new user successfuly");

        return redirect()->route('dashboard.user.index');
    }

    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
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

        flash()->success("User update successfuly");

        return redirect()->route('dashboard.user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        flash()->error("User deleted successfully");

        return back();
    }

}

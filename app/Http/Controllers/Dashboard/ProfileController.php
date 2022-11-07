<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $user = User::find(Auth::user()->id);
        
        return view('dashboard.profile.index', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->username = $request->username;

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if ($request->has('thumbnail')) {
            $user->clearMediaCollection('thumbnail');
            $user->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentAPIController extends Controller
{
    function search(Request $request){
        return User::search($request->q)
                ->take(15)
                ->get()
                ->map(function($q){
                    return [
                        'first_name' => $q->first_name,
                        'middle_name' => $q->middle_name,
                        'last_name' => $q->last_name,
                        'section' => optional($q->section)->name,
                    ];
                });
    }
}

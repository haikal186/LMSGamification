<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class StudentController extends Controller
{
    public function index()
    {
        $users = User::whereHas('hasRole', function ($query) {
            $query->where('name', 'student');
        })->get();
    
        return view('student.index', compact('users'));
    }
}

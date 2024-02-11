<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth()->user();
        $role = $user -> hasRole -> name;
        $total_course = $user->enrolls()->count();
        $total_quiz = $user->scores()->distinct('quiz_id')->count();

        return view('home', compact('user', 'role','total_course','total_quiz'));
    }
}
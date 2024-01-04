<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class EnrollController extends Controller
{
    public function index()
    {
        $user = auth()->user(); 
        $enrolls = $user->enrolls()->get();
        $courses = Course::all(); 
       
        return view('enroll.index', compact('enrolls','courses'));
    }

    public function store(Request $request, $course_id)
    {
        $courses = Course::findOrFail($course_id);
        $user = auth()->user(); 

        $is_enrolled = Enroll::where('user_id', $user->id)
                        ->where('course_id', $course_id)
                        ->exists();

        if ($is_enrolled) {
            return redirect()->route('enroll.index');
        }
    
        $enrolls = Enroll::create([
            'user_id' => $user->id,
            'course_id' => $course_id,
            'enroll_date' => Carbon::now(),
        ]);
    
        return view('enroll.index', compact('enrolls','courses'));
    }

    public function show(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);

        return view('enroll.show',compact('course'));
    }

    public function quiz(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);

        
        return view('enroll.quiz',compact('course'));
    }
}

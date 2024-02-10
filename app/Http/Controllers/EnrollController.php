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
        
        $enrolls = $user->enrolls()->with('course')->get(); 
        return view('enroll.index', compact('enrolls'));
    }

    public function store(Request $request, $course_id)
    {
        $courses = Course::findOrFail($course_id);
        $user = auth()->user(); 

        // Check if the user is already enrolled in the course
        if ($user->enrolls()->where('course_id', $course_id)->exists()) {
            return redirect()->route('enroll.index');
        }
    
        $enrolls = Enroll::create([
            'user_id' => $user->id,
            'course_id' => $course_id,
            'enroll_date' => Carbon::now(),
        ]);
    
        return redirect()->route('enroll.index');
    }

    public function show(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $file   = $course->file;

        return view('enroll.show',compact('course','file'));
    }

    public function quiz(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);

        
        return view('enroll.quiz',compact('course'));
    }
}

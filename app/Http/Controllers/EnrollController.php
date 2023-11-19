<?php

namespace App\Http\Controllers;

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
        $enrolledCourseIds = $user->courses->pluck('id')->all(); // Get the IDs of courses the user is enrolled in
    
        $courses = Course::whereIn('id', $enrolledCourseIds)->get();
        $totalCourse = $courses->count();
    
        return view('enroll.index', compact('courses', 'totalCourse'));
    }

    public function create(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $user = auth()->user(); 
    
        // Check if the user is already enrolled in the course
        if ($user->courses->contains($course)) {
            return redirect()->route('enroll.create', $course->id);
        }
    
        // Enroll the user in the course
        $enroll = new Enroll();
        $enroll->enroll_date = now();
        $enroll->user_id = $user->id;
        $enroll->course_id = $course->id;
        $enroll->save();
    
        // Redirect to the list page after successful enrollment
        return redirect()->route('enroll.index');
    }

    public function show()
    {
        return view('enroll.show');
    }
}

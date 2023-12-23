<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enroll;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller{

    public function index()
    {
        $course = Course::all();
        $totalCourse = $course->count();
        return view('course.index',compact('course','totalCourse'));

    }

    public function create()
    {  
        return view('course.create');
    }

    public function store(Request $request)
    {
        Course::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return to_route('course.index');
    }

    public function show(Request $request, $course_id){

        $course = Course::findOrFail($course_id);
        $quizzes = $course->quizzes;
        // $course_id = $course->id;
        
        return view('course.show', compact('course', 'quizzes'));
    }

    public function edit(string $id)
    {
        $course = Course::findOrFail($id);

        return view('course.edit',compact('course'));
    }
    
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $course->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('course.show', $course->id);
    }
    
    public function lesson()
    {
        return view('course.lesson');
    }

}
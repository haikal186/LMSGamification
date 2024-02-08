<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enroll;
use App\Models\Quiz;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller{

    public function index()
    {
        $courses = Course::all();
        $totalCourse = $courses->count();
        return view('course.index',compact('courses','totalCourse'));

    }

    public function create()
    {  
        return view('course.create');
    }

    public function store(Request $request)
    {
        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        
        // Handle File Upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $storedFileName = $fileName . '_' . time() . '.' . $extension;

            // Store the file in storage/app/public/uploads directory
            $file->storeAs('public/uploads', $storedFileName);

            // Create the file associated with the course
            $course->file()->create([
                'original_name' => $originalName,
                'name' => $storedFileName,
                'file_path' => 'http://127.0.0.1:8000/storage/uploads/' . $storedFileName,
                'file_type' => $file->getClientMimeType(),
            ]);
        }


        return redirect()->route('course.index');
    }
    

    public function show(Request $request, $course_id){

        $course = Course::findOrFail($course_id);
        $quizzes = $course->quizzes;
        $file = $course->file;
        

        $assignments = $course->assignments;
        
        return view('course.show', compact('course', 'quizzes','assignments','file'));
    }

    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        $file = $course->file;

        return view('course.edit',compact('course','file'));
    }
    
    public function update(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);

        $course->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $storedFileName = $fileName . '_' . time() . '.' . $extension;

            $file->storeAs('public/uploads', $storedFileName);
            

            if ($course->file) {
                Storage::delete('public/uploads/' . $course->file->name);
                $course->file()->delete();
            }

            $course->file()->create([
                'original_name' => $originalName,
                'name' => $storedFileName,
                'file_path' => 'http://127.0.0.1:8000/storage/uploads/' . $storedFileName,
                'file_type' => $file->getClientMimeType(),
            ]);
        }

        return redirect()->route('course.show', $course->id);
    }

    public function delete(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);      

        return view('course.delete', compact('course'));
    }

    public function destroy(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $course->delete();
        
        return redirect()->route('course.index')->with('success', 'User deleted successfully');
    } 
}
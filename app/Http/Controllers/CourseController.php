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

    public function search(Request $request)
    {   
        $search = $request->search;
        $filter = $request->course_name;

        $courses = Course::query();
        if ($search) {
            $courses->where('name', 'LIKE', '%' . $search . '%');
        }

        if ($filter) {
            $courses->where('name', $filter);
        }

        $courses = $courses->get();

        if ($courses->isEmpty()) {

            $courses = Course::all();
        }

        $totalCourse = $courses->count();

        return view('course.index', compact('courses', 'totalCourse'));
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
    

    public function show(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $quizzes = $course->quizzes;
        $file_course = $course->file;

        $assignments = $course->assignments;
        $total_students = $course->enrolls->count();
        

        $quiz_students_count = [];
        foreach ($quizzes as $quiz) {
            // Count the number of unique users who have scores for this quiz
            $quiz_students_count[$quiz->id] = $quiz->scores()->groupBy('user_id')->count();
        }
        
        return view('course.show', compact('course', 'quizzes','assignments','file_course','total_students','quiz_students_count'));
    }

    public function storeFile(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id); 

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
        return redirect()->route('course.edit', ['course_id' => $course_id]);
    }

    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        $file_course   = $course->file;
        $count = 0;

        return view('course.edit',compact('course','file_course','count'));
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

            if ($course->file->count() > 0) {
                $fileToDelete = $course->file->first(); 
                Storage::delete('public/uploads/' . $fileToDelete->name);
                $fileToDelete->delete();
            }

            $course->file()->create([
                'original_name' => $originalName,
                'name'          => $storedFileName,
                'file_path'     => 'http://127.0.0.1:8000/storage/uploads/' . $storedFileName,
                'file_type'     => $file->getClientMimeType(),
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

    public function destroyFile(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $file_id = $request->file_id;

        $file = File::where('id', $file_id)
                ->where('fileable_id', $course->id)
                ->where('fileable_type', 'course')
                ->first();

        if ($file) 
        {
            $file->delete();
            Storage::delete('public/uploads/' . $file->name);
        }

        return redirect()->route('course.edit', ['course_id' => $course_id]);
    } 
}
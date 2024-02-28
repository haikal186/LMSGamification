<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
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
        $user           = Auth()->user();
        $course         = Course::findOrFail($course_id);
        $file_course    = $course->file;
        $total_students = $course->enrolls->count();
        $count          = 0;
        $assignments    = $course->assignments()->with('files')->get();

        //check if the user submit or not for assignments
        $status = [];
        foreach ($assignments as $assignment) {
            $submission = $assignment->submissions()->where('user_id', $user->id)->first();
            $status[$assignment->id] = $submission ? 'Submitted' : 'Not Submitted';
        } 

        return view('enroll.show',compact('course','file_course','total_students','count','assignments','status'));
    }

    public function storeFile(Request $request, $assignment_id)
    {
        $assignment = Assignment::findOrFail($assignment_id); 
        $course = $assignment->course->id;
        $user = Auth()->user();

        $submission = Submission::create([
            'submission_date' => Carbon::now(),
            'assignment_id'   => $assignment_id,
            'user_id'         => $user->id
        ]);

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
            $assignment->files()->create([
                'original_name' => $originalName,
                'name' => $storedFileName,
                'file_path' => 'http://127.0.0.1:8000/storage/uploads/' . $storedFileName,
                'file_type' => $file->getClientMimeType(),
            ]);
        }
        return redirect()->route('enroll.show', ['course_id' => $course]);
    }

    public function quiz(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);

        return view('enroll.quiz',compact('course'));
    }
}

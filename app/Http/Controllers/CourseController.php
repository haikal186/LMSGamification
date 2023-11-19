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
            'title' => $request->title,
            'description' => $request->description
        ]);

        return to_route('course.index');
    }

    public function detail(Request $request, $id){

        $course = Course::findOrFail($id);
        $quizzes = $course->quizzes;
        $course_id = $course->id;
        
        return view('course.detail', compact('course', 'quizzes'));
    }

    public function list()
    {
        $user = auth()->user(); // Get the authenticated user
        $enrolledCourseIds = $user->courses->pluck('id')->all(); // Get the IDs of courses the user is enrolled in
    
        $courses = Course::whereIn('id', $enrolledCourseIds)->get();
        $totalCourse = $courses->count();
    
        return view('course.list', compact('courses', 'totalCourse'));
    }

    public function enroll(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $user = auth()->user(); // Get the authenticated user
    
        // Check if the user is already enrolled in the course
        if ($user->courses->contains($course)) {
            return redirect()->route('course.detail', $course->id)->with('error', 'You are already enrolled in this course.');
        }
    
        // Enroll the user in the course
        $enroll = new Enroll();
        $enroll->enroll_date = now();
        $enroll->user_id = $user->id;
        $enroll->course_id = $course->id;
        $enroll->save();
    
        // Redirect to the list page after successful enrollment
        return redirect()->route('course.list')->with('success', 'You have successfully enrolled in the course.');
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
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('course.detail', $course->id)->with('success', 'Course details updated successfully.');
    }

    public function createQuiz(Request $request, $course_id)
    {
        // Validate the form data
        // dd($request->title,$course_id);
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'course_id' => 'required|exists:courses,id',
        ]);

        // Create a new quiz
        $quiz = Quiz::create([
            'title' => $request->title,
            'description' => $request->description,
            'course_id' => $course_id,
        ]);

        // Get the ID of the created quiz
        $quizId = $quiz->id;

        // Redirect to the question view with the associated course ID and quiz ID
        return redirect()->route('course.question', ['id' => $request->input('course_id'), 'quiz_id' => $quizId])->with('success', 'Quiz created successfully.');
    }

    public function questionView($id, $quiz_id)
    {
        // Get the course details by ID
        $course = Course::findOrFail($id);

         // Get the quiz details by quiz ID
        $quiz = Quiz::findOrFtail($quiz_id);

        // Pass the course and quiz details to the view
        return view('course.question', compact('course', 'quiz'));
    }

    public function updateQuiz(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        $quiz->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('course.question', ['id' => $quiz->course_id, 'quiz_id' => $quiz->id])->with('success', 'Quiz details updated successfully.');
    }

    public function quizList()
    {
        $quizzes = Quiz::with('course')->get();
        $totalQuiz = $quizzes->count();
        // Fetching unique courses from quizzes
        $courses = Course::whereIn('id', $quizzes->pluck('course_id')->unique())->get();
        return view('course.quizlist', compact('quizzes', 'totalQuiz', 'courses'));
    }


    public function overview()
    {
        return view('course.overview');
    }

    public function lesson()
    {
        return view('course.lesson');
    }

    public function quiz(){
        
        return view('course.quiz');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('course')->get();
        $totalQuiz = $quizzes->count();
        // Fetching unique courses from quizzes
        $courses = Course::whereIn('id', $quizzes->pluck('course_id')->unique())->get();
        return view('quiz.index', compact('quizzes', 'totalQuiz', 'courses'));
    }

    public function store(Request $request, $course_id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'course_id' => 'required|exists:courses,id',
        ]);

        $quiz = Quiz::create([
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $course_id,
        ]);

        $quiz_id = $quiz->id;

        // Redirect to the question view with the associated course ID and quiz ID
        return redirect()->route('quiz.show', ['id' => $request->$course_id, 'quiz_id' => $quiz_id]);
    }

    public function show($course_id, $quiz_id)
    {
        $course = Course::findOrFail($course_id);
        $quiz = Quiz::findOrFail($quiz_id);

        return view('quiz.show', compact('course', 'quiz'));
    }

    public function update(Request $request, $course_id, $quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id); 

        $quiz->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('quiz.show', ['course_id' => $quiz->course_id, 'quiz_id' => $quiz->id]);
    }


}

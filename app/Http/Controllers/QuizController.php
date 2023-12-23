<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Answer;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('course')->get();
        
        $quizzes->each(function ($quiz) {
            $quiz->question_count = $quiz->questions()->count();
        });

        $totalQuiz = $quizzes->count();
        $courses = Course::with('quizzes')->get();

        return view('quiz.index', compact('quizzes', 'totalQuiz', 'courses'));
    }

    public function store(Request $request, $course_id)
    {
        $quiz = Quiz::create([
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $course_id,
        ]);

        $quiz_id = $quiz->id;
        return redirect()->route('quiz.show', ['quiz_id' => $quiz_id]);
    }

    public function show($quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $course = $quiz->course;
        $questions = $quiz->questions()->with('answers')->get();

        return view('quiz.show', compact('quiz', 'course', 'questions'));
    }


    public function update(Request $request, $quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id); 
        $quiz->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $quiz_id = $quiz->id;
        return redirect()->route('quiz.show', ['quiz_id' => $quiz_id]);

    }


}

<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Quiz;
use App\Models\Score;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('course')->get();
        
        $quizzes->each(function ($quiz) {
            $quiz->question_count = $quiz->questions()->count();
            $quiz->total_students = $quiz->scores()->distinct('user_id')->count();
        });

        $totalQuiz = $quizzes->count();
        $courses = Course::with('quizzes')->get();

        return view('quiz.index', compact('quizzes', 'totalQuiz', 'courses'));
    }

    public function search(Request $request)
    {   
        $search = $request -> search;
        $filter = $request -> course_name;

        $quizzes = Quiz::with([
            'course'
        ])
        -> when ($filter !== null, function ($q) use ($search, $filter) {
            $q -> where('name', 'LIKE', '%' . $search . '%')
                -> whereHas('course', function ($q) use ($search, $filter) {
                    $q -> where('name', $filter);
            });
        })
        -> when ($filter == null, function ($q) use ($search, $filter) {
            $q -> where('name', 'LIKE', '%' . $search . '%');
        })
        -> get();

        $courses = Course::with('quizzes')->get();
        $totalQuiz = $quizzes->count();

        return view('quiz.index', compact('quizzes', 'totalQuiz', 'courses'));
    }

    public function store(Request $request, $course_id)
    {
        $quiz = Quiz::create([
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $course_id,
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $storedFileName = $fileName . '_' . time() . '.' . $extension;

            $file->storeAs('public/uploads', $storedFileName);
            
            $quiz->file()->create([
                'original_name' => $originalName,
                'name' => $storedFileName,
                'file_path' => 'http://127.0.0.1:8000/storage/uploads/' . $storedFileName,
                'file_type' => $file->getClientMimeType(),
            ]);
        }

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
            'level' => $request->level,
            'quiz_duration' => $request->quiz_duration,
        ]);

        if ($request->hasFile('file')) {

            if ($quiz->file()->exists()) {
                $existingFile = $quiz->file()->first();
                Storage::delete('public/uploads/' . $existingFile->name);
                $existingFile->delete();
            }
    
            // Store new file
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $storedFileName = $fileName . '_' . time() . '.' . $extension;
    
            $file->storeAs('public/uploads', $storedFileName);
    
            $quiz->file()->create([
                'original_name' => $originalName,
                'name' => $storedFileName,
                'file_path' => 'http://127.0.0.1:8000/storage/uploads/' . $storedFileName,
                'file_type' => $file->getClientMimeType(),
            ]);
        }

        $quiz_id = $quiz->id;
        return redirect()->route('quiz.show', ['quiz_id' => $quiz_id]);
    }

    public function detail(Request $request,$quiz_id)
    {
        $user_scores    = [];
        $count          = 1;
        $quiz           = Quiz::findOrFail($quiz_id);
        $file_quiz      = $quiz->file;
        $total_students = $quiz->scores()->distinct('user_id')->count();

        //for leaderboards
        $scores = Score::where('quiz_id', $quiz_id)->latest('score')->get();

        foreach ($scores as $score) {
            // Check if the user ID has not been encountered before in $user_scores
            $userExists = false;
            foreach ($user_scores as $user_score) {
                if ($user_score['user']['id'] === $score->user->id) {
                    $userExists = true;
                    break;
                }
            }
        
            if (!$userExists) {
                $user_scores[] = [
                    'score' => $score->toArray(),
                    'user' => $score->user->toArray(),
                ];
            }
        }

        return view('quiz.detail',compact('quiz','file_quiz','total_students','scores', 'user_scores', 'count'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    public function create(Request $request, $quiz_id)
    {  
        $quiz = Quiz::findOrFail($quiz_id);
        $questions = $quiz->questions;
        return view('question.create', compact('quiz','questions'));
    }

    public function store(Request $request, $quiz_id)
    {

        $quiz = Quiz::findOrFail($quiz_id);
        $question = Question::create([
            'name' => $request->question_name,
            'quiz_id' => $quiz_id,
        ]);

        $answerNames = $request->input('answer_name');
        $isTrueValues = $request->input('is_true');

        foreach ($answerNames as $key => $answer) {
            $isTrue = in_array($key, $isTrueValues) ? 1 : 0;

            $newAnswer = $question->answers()->create([
                'name' => $answer,
                'is_true' => $isTrue,
            ]);
        }
        
        return redirect()->route('question.create', $quiz_id);
    }

    public function show(Request $request, $question_id)
    {
        $user = Auth()->user();
        $question_find = Question::findOrFail($question_id);
        $quiz = $question_find->quiz;
    
        $questions = Question::whereHas('quiz', function ($q) use ($user) {
            $q->whereHas('course', function ($q) use ($user) {
                $q->when($user -> role == 'student', function($q) use ($user) {
                    $q->whereHas('enrolls', function ($q) use ($user) {
                        $q->where('user_id', $user->id);
                    });
                });
            });
        })->get();

        $question = Question::findOrFail($question_id);
        return view('question.show', compact('questions','question_find','quiz','question'));

    }
    
    public function update(Request $request, $question_id)
    {
        $question = Question::findOrFail($question_id); 
        $question->update([
            'name' => $request->question_name,
        ]);

        $answerNames = $request->input('answer_name');
        $isTrueValues = $request->input('is_true');

        foreach ($question->answers as $key => $answer) {
            $answer->update([
                'name' => $answerNames[$key], 
                'is_true' => in_array($key, $isTrueValues) ? 1 : 0, 
            ]);
        }

        return redirect()->route('question.show', $question_id);
    }

}

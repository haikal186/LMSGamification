<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    public function create($quiz_id)
    {  
        return view('question.create', compact('quiz_id'));
    }

    public function store(Request $request, $quiz_id)
    {
        Question::create([
            'name' => $request->name,
            'quiz_id' => $quiz_id,
        ]);

        return redirect()->route('question.create');
    }

}

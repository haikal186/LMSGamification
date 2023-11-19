<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    public function create()
    {  
        return view('question.create');
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

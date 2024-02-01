<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
        
        // Handle File Upload
        if($request->hasFile('file')) {
            
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $storedFileName = $fileName . '_' . time() . '.' . $extension;

            // Store the file in storage/app/public/uploads directory
            $file->storeAs('public/uploads', $storedFileName);

            $question->file()->create([
                'original_name' => $originalName,
                'name' => $storedFileName,
                'file_path' => 'http://127.0.0.1:8000/storage/uploads/' . $storedFileName,
                'file_type' => $file->getClientMimeType(),
            ]);
        }

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
        $question = Question::findOrFail($question_id);
        $file = $question->file;
        $questions = $quiz->questions;
    

        return view('question.show', compact('questions','question_find','quiz','question','file'));

    }

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function showImage($filename)
    {
        $path = storage_path('app/public/uploads/' . $filename);

        if (!Storage::exists($path)) {
            abort(404);
        }

        $file = Storage::get($path);
        $type = Storage::mimeType($path);

        return response($file)->header('Content-Type', $type);
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

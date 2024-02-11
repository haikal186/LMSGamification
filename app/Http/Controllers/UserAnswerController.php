<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Score;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\Achievement;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    public function show(Request $request, $question_id)
    {
        $user = Auth()->user();
        $question = Question::findOrFail($question_id); 

        $question_numbers = $question->quiz->questions;
        $answers = $question->answers;
        $quiz_duration = $question->quiz->quiz_duration;

        $max_question_id = $question->quiz->questions()->max('id');
        $is_last_question = ($question_id == $max_question_id);

        $file_question = $question->file;

        UserAnswer::updateOrCreate(
            [
                'user_id'     => $user->id,
                'question_id' => $question_id,
            ],
            [
                'is_correct'  => 0,
                'question_id' => $question_id,
                'user_id'     => $user->id,
                'created_at'  => Carbon::now(),
            ]
        );

        return view('user_answer.show', compact('question', 'question_numbers', 'answers', 'quiz_duration', 'is_last_question','file_question'));
    }

    public function store(Request $request, $question_id)
    {
        $is_correct = false;
        $user = Auth()->User();
        $question = Question::findOrFail($question_id);
        $duration = 0;
        $quiz = $question -> quiz;

        //compare requested answer with set answer
        foreach($question->answers as $answer)
        {
            if ($request->answer == $answer->id)
            {   
                if ($answer -> is_true == false)
                {
                    $is_correct = false;
                }
                else
                {
                    $is_correct = true;
                }
            }
        }

        //Insert table user answer
        $selected_answer_id = $request->answer;
        $user_answer = UserAnswer::updateOrCreate(
            [
                'user_id'     => $user->id,
                'question_id' => $question_id,
            ],
            [
                'is_correct'  => $is_correct,
                'question_id' => $question->id,
                'user_id'     => $user->id,
                'answer_id' => $selected_answer_id,
            ]
        );

        $quiz_duration = $question->quiz->quiz_duration;
        $quiz_id = $question -> quiz -> id;

        //insert table Scores
        $date_completed = Carbon::now();
        $point = $this->calculateScore($user->id, $question->quiz->id);
        
        $score = Score::updateOrCreate(
            [
                'user_id' => $user->id,
                'quiz_id' => $quiz_id,
            ],
            [
                'score' => $point,
                'date_completed' => $date_completed,
            ]
        );
        
        $next_question_id = $question_id + 1;
        $total_questions = $question->quiz->questions()->max('id');

        // Calculate duration of the quiz taken
        $quiz_start_time = $user_answer->created_at;
        $quiz_finish_time = $user_answer->created_at;
        
        $first_question = $quiz -> questions -> first();
        $last_question = $quiz -> questions -> last();

        if ($user_answer -> question_id == $last_question -> id)
        {
            $user_quizzes = $user -> scores -> where('quiz_id', $quiz_id) -> first() -> quizzes;
            $user_question = $user_quizzes -> questions -> where('quiz_id', $quiz_id) -> first();
            $user_answer_created_at = $user_question -> userAnswers -> first() -> created_at;

            $duration = Carbon::parse($user_answer->updated_at)->diffInSeconds(Carbon::parse($user_answer_created_at));
        }


        if ($question_id == $total_questions) {
            $score->update([
                'duration' => $duration,
            ]);
    
            $quiz_id = $question->quiz->id;
    
            // Determine achievement IDs
            $achievement_ids = $this->determineAchievements($point, $duration, $quiz_duration);
    
            // Create or update a record in the scores table for each achievement attained
            foreach ($achievement_ids as $achievement_id) {
                Score::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'quiz_id' => $quiz_id,
                        'achievement_id' => $achievement_id,
                    ],
                    [
                        'score' => $point,
                        'date_completed' => $date_completed,
                    ]
                );
            }
    
            return redirect()->route('user_answer.result', ['quiz_id' => $quiz_id]);
        } else {
            // If not the last question, proceed to the next question
            return redirect()->route('user_answer.show', ['question_id' => $next_question_id]);
        }

    }

    

    public function calculateScore($user_id, $quiz_id)
    {
        $count_score = UserAnswer::whereHas('question', function ($query) use ($quiz_id) {
            $query->where('quiz_id', $quiz_id);
        })->where('user_id', $user_id)
        ->where('is_correct', true)
        ->count();
        
        $total_questions = Question::where('quiz_id', $quiz_id)->count();
    
        $score = ($count_score / $total_questions) * 100;

        return $score;
    }

    public function determineAchievements($score, $duration, $quiz_duration)
    {
        $achievement_ids = []; 

        // Retrieve specific achievements by their names
        $full_marks = Achievement::where('name', 'Full Marks')->first();
        $high_score = Achievement::where('name', 'High Score')->first();
        $fast_completion_time = Achievement::where('name', 'Fast Completion Time')->first();

        if ($score == 100) { 
            $achievement_ids[] = $full_marks->id; 
        } 

        if ($score >= 90) { 
            $achievement_ids[] = $high_score->id; 
        }

        if ($duration < (0.3 * $quiz_duration)) { 
            $achievement_ids[] = $fast_completion_time->id;
        }

        return $achievement_ids;
    }


    public function result(Request $request, $quiz_id)
    {
        $user = Auth()->User();
        $quiz = Quiz::findOrFail($quiz_id);
        $achievements = Achievement::all();

        $scores = $quiz->scores;
        foreach ($scores as $score) {
            $total_score = $score->score; 
        }

        $user_answers = UserAnswer::where('user_id', $user->id)
        ->whereIn('question_id', $quiz->questions->pluck('id'))
        ->get()
        ->groupBy('question_id');

        $user_scores = Score::where('user_id', $user->id)
                            ->where('quiz_id', $quiz->id)
                            ->get();
        
        $achievement_ids = [];
        
        foreach ($user_scores as $score) {
            $achievement_ids[] = $score->achievement_id;
        }


        $question_numbers = $quiz->questions;

        return view('user_answer.result', compact('quiz', 'question_numbers', 'achievements', 'achievement_ids','total_score','user_answers'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Quiz;
use App\Models\Score;
use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user_achievements = $user->scores()->get();

        $completion_percentages = [];
        $grouped_achievements = [];

        foreach ($user_achievements as $achievement) {
            $quiz_id = $achievement->quiz_id;

            if (!array_key_exists($quiz_id, $grouped_achievements)) {
                $grouped_achievements[$quiz_id] = collect([$achievement]);
            } else {
                $grouped_achievements[$quiz_id]->push($achievement);
            }
        }

        foreach ($grouped_achievements as $quiz_id => $achievements) {
            $total_achievements = Achievement::count();

            $completed_achievements = $achievements
                ->whereNotNull('achievement_id')
                ->count();

            if ($completed_achievements > 0) {
                $percentage = ($completed_achievements / $total_achievements) * 100;
            } else {
                $percentage = 0;
            }

            $completion_percentages[$quiz_id] = $percentage;
        }

        return view('achievement.index', compact('grouped_achievements', 'completion_percentages','quiz_id'));
    }

    public function show(Request $request, $quiz_id)
    {
        $user = auth()->user();
        $scores = $user->scores()->get();

        $quiz = Quiz::findOrFail($quiz_id);
        $quiz_name = $quiz->name;

        $achievements = Achievement::all();
        $total_achievement = Achievement::count();

        $user_achievement_ids = [];

        foreach ($scores as $score) {
            if ($score->achievement_id !== null) {
                $user_achievement_ids[] = $score->achievement_id;
            }
        }

        $user_achievements = count($user_achievement_ids);

        return view('achievement.show', compact('achievements', 'total_achievement', 'user_achievements', 'quiz_name'));
    }
}


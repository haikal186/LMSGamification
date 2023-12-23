<?php

namespace App\Http\Controllers;

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

        $userId = auth()->id(); 

        // Get the courses taken by the user
        $courses = Course::whereIn('id', function ($query) use ($userId) {
            $query->select('course_id')
                ->from('enrollments')
                ->where('user_id', $userId);
        })->get();

        $data = [];
        $counter = 1;

        foreach ($courses as $course) {
            // Get quizzes for each course taken by the user
            $quizzes = Quiz::where('course_id', $course->id)->get();

            foreach ($quizzes as $quiz) {
                // Get all achievement IDs for this quiz
                $allAchievements = Achievement::pluck('id')->toArray();

                // Get achievement IDs achieved by the user for this quiz
                $userAchievements = Score::where('user_id', $userId)
                    ->where('quiz_id', $quiz->id)
                    ->pluck('achievement_id')
                    ->toArray();

                // Check if the user has achieved all the achievements for this quiz
                $isComplete = count(array_diff($allAchievements, $userAchievements)) === 0;

                // Determine the status based on completeness
                $status = $isComplete ? 'Complete' : 'Not Complete';

                $dateTaken = '25-01-2021'; // Replace with actual date retrieval

                // Prepare data for view
                $data[] = [
                    'id' => $counter++,
                    'course_name' => $course->name,
                    'quiz_name' => $quiz->name,
                    'date_completed' => $dateTaken,
                    'status' => $status,
                ];
            }
        }

        // Pass $data to the view for rendering
        return view('achievement.index', compact('data'));
    }

    public function show()
    {
        $achievement = Achievement::all();
        $totalAchievement = $achievement->count();
        return view('achievement.show',compact('achievement','totalAchievement'));

    }
}


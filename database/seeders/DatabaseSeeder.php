<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\QuizSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AnswerSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\QuestionSeeder;
use Database\Seeders\AchievementSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CourseSeeder::class,
            QuizSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            AchievementSeeder::class,

        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
      /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quizzes')->insert([

            // Laravel
            [
                'id'            => 1,
                'name'          => 'CRUD',
                'description'   => 'Basic create, update, delete functions of laravel CRUD',
                'quiz_duration' => 300,
                'course_id'     => 1,
            ],
            [
                'id'            => 2,
                'name'          => 'Migration',
                'description'   => 'Creating database using migration in Laravel',
                'quiz_duration' => 300,
                'course_id'     => 1
            ],
            [
                'id'            => 3,
                'name'          => 'MVC',
                'description'   => 'MVC architecture of laravel',
                'quiz_duration' => 300,
                'course_id'     => 1
            ],

            // Java 
            [
                'id'            => 4,
                'name'          => 'CRUD',
                'description'   => 'Basic create, update, delete functions of Java CRUD',
                'quiz_duration' => 300,
                'course_id'     => 2
            ],
            [
                'id'            => 5,
                'name'          => 'OOP',
                'description'   => 'Architecture of Java',
                'quiz_duration' => 300,
                'course_id'     => 2
            ],
            [
                'id'            => 6,
                'name'          => 'Data Structure',
                'description'   => 'Definition of data structure',
                'quiz_duration' => 300,
                'course_id'     => 2
            ],
        ]);
    }
}

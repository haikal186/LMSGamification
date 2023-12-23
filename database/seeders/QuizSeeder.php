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
                'id'          => 1,
                'name'        => 'CRUD',
                'description' => 'Basic create, update, delete functions of laravel CRUD',
                'course_id'   => 1
            ],
            [
                'id'          => 2,
                'name'        => 'Migration',
                'description' => 'Creating database using migration in Laravel',
                'course_id'   => 1
            ],
            [
                'id'          => 3,
                'name'        => 'MVC',
                'description' => 'MVC architecture of laravel',
                'course_id'   => 1
            ],

            // Java 
            [
                'id'          => 4,
                'name'        => 'CRUD',
                'description' => 'Basic create, update, delete functions of Java CRUD',
                'course_id'   => 2
            ],
            [
                'id'          => 5,
                'name'        => 'OOP',
                'description' => 'Architecture of Java',
                'course_id'   => 2
            ],
            [
                'id'          => 6,
                'name'        => 'Data Structure',
                'description' => 'Definition of data structure',
                'course_id'   => 2
            ],
        ]);
    }
}

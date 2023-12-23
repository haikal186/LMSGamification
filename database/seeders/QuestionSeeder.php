<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([

            // Quiz Laravel CRUD
            [
                'id'      => 1,
                'name'    => 'What does CRUD stand for in Laravel?',
                'quiz_id' => 1,
            ],
            [
                'id'      => 2,
                'name'    => 'Which HTTP methods correspond to the CRUD operations?',
                'quiz_id' => 1,
            ],
            [
                'id'      => 3,
                'name'    => 'How can you create a new resource in Laravel using CRUD operations?',
                'quiz_id' => 1,
            ],

            // Quiz Laravel Migration
            [
                'id'      => 4,
                'name'    => 'What is the purpose of migrations in Laravel?',
                'quiz_id' => 2,
            ],
            [
                'id'      => 5,
                'name'    => 'How do you create a new migration file in Laravel?',
                'quiz_id' => 2,
            ],
            [
                'id'      => 6,
                'name'    => 'What command is used to execute all pending migrations in Laravel?',
                'quiz_id' => 2,
            ],


            // Quiz Laravel MVC 
            [
                'id'      => 7,
                'name'    => 'What does MVC stand for in Laravel?',
                'quiz_id' => 3,
            ],
            [
                'id'      => 8,
                'name'    => 'What is the role of the Model in the MVC architecture of Laravel.',
                'quiz_id' => 3,
            ],
            [
                'id'      => 9,
                'name'    => 'What does the View represent in the MVC pattern in Laravel?',
                'quiz_id' => 3,
            ],

            // Quiz JAVA CRUD 
            [
                'id'      => 10,
                'name'    => 'What does CRUD stand for in Java programming?',
                'quiz_id' => 4,
            ],
            [
                'id'      => 11,
                'name'    => 'Which Java classes or entities are typically involved in performing CRUD operations?',
                'quiz_id' => 4,
            ],
            [
                'id'      => 12,
                'name'    => 'What is the purpose of the create operation in CRUD in Java.',
                'quiz_id' => 4,
            ],

            // Quiz JAVA Object Oriented Programming 
            [
                'id'      => 13,
                'name'    => 'What is Object-Oriented Programming (OOP) in Java?',
                'quiz_id' => 5,
            ],
            [
                'id'      => 14,
                'name'    => 'What is the explaination of the core principles of OOP in Java.',
                'quiz_id' => 5,
            ],
            [
                'id'      => 15,
                'name'    => 'What is a class in Java, and how is it used in OOP?',
                'quiz_id' => 5,
            ],

            // Quiz JAVA Data Structure 
            [
                'id'      => 16,
                'name'    => 'What is a data structure in Java?',
                'quiz_id' => 6,
            ],
            [
                'id'      => 17,
                'name'    => 'What is the correct built-in data structures available in Java.',
                'quiz_id' => 6,
            ],
            [
                'id'      => 18,
                'name'    => 'What is the difference between an ArrayList and a LinkedList in Java.',
                'quiz_id' => 6,
            ],
        ]);
    }
}

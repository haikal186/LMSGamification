<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assignments')->insert([

            // Laravel
            [
                'id'            => 1,
                'name'          => 'Laravel Basics Assignment',
                'description'   => 'Complete a set of exercises to practice fundamental concepts in Laravel.',
                'course_id'     => 1,
            ],
            [
                'id'            => 2,
                'name'          => 'Laravel Database Assignment',
                'description'   => 'Create a database schema and implement CRUD operations in a Laravel application.',
                'course_id'     => 1,
            ],
            [
                'id'            => 3,
                'name'          => 'Laravel Authentication Assignment',
                'description'   => 'Implement user authentication and authorization functionality in a Laravel project.',
                'course_id'     => 1,
            ],

            //Java 
            [
                'id'            => 4,
                'name'          => 'Java Basics Assignment',
                'description'   => 'Complete exercises to solidify understanding of basic Java programming concepts.',
                'course_id'     => 2,
            ],
            [
                'id'            => 5,
                'name'          => 'Java OOP Assignment',
                'description'   => 'Implement object-oriented programming principles in Java through practical tasks.',
                'course_id'     => 2,
            ],
            [
                'id'            => 6,
                'name'          => 'Java GUI Project',
                'description'   => 'Develop a graphical user interface (GUI) application using Java Swing or JavaFX.',
                'course_id'     => 2,
            ],
            
        ]);
    }
}

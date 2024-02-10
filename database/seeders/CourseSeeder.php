<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
      /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'id'          => 1,
                'name'        => 'Laravel',
                'description' => 'Learning laravel basic CRUD',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => 2,
                'name'        => 'Java',
                'description' => 'Architecture of Java',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}

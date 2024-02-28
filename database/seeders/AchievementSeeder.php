<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('achievements')->insert([
            [
                'id'   => 1,
                'name' => 'Full Marks',
            ],
            [
                'id'   => 2,
                'name' => 'High Score',
            ],
            [
                'id'   => 3,
                'name' => 'Fast Completion Time',
            ],
        ]);
    }
}

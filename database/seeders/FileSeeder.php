<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('files')->insert([

            //user profile
            [
                'id'            => 1,
                'original_name' => 'haikal.png',
                'name'          => 'haikal.png',
                'file_path'     => 'http://127.0.0.1:8000/storage/uploads/haikal.png',
                'file_type'     => 'image/png',
                'fileable_type' => 'user',
                'fileable_id'   => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            //achievements 
            [
                'id'            => 2,
                'original_name' => 'fullmark_badge.png',
                'name'          => 'fullmark_badge.png',
                'file_path'     => 'http://127.0.0.1:8000/storage/uploads/fullmark_badge.png',
                'file_type'     => 'image/png',
                'fileable_type' => 'achievement',
                'fileable_id'   => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            [
                'id'            => 3,
                'original_name' => 'highscore.png',
                'name'          => 'highscore.png',
                'file_path'     => 'http://127.0.0.1:8000/storage/uploads/highscore.png',
                'file_type'     => 'image/png',
                'fileable_type' => 'achievement',
                'fileable_id'   => 2,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            [
                'id'            => 4,
                'original_name' => 'fast_time.png',
                'name'          => 'fast_time.png',
                'file_path'     => 'http://127.0.0.1:8000/storage/uploads/fast_time.png',
                'file_type'     => 'image/png',
                'fileable_type' => 'achievement',
                'fileable_id'   => 3,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}

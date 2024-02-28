<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
      /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id'       => 1,
                'name'     => 'Muhammad Haikal Bin Abdul Hadi',
                'email'    => 'haikal@gmail.com',
                'password' => Hash::make('password'),
                'role_id'  => 2,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'       => 2,
                'name'     => 'Muhammad Azhar Al-Qardawi',
                'email'    => 'azhar@gmail.com',
                'password' => Hash::make('password'),
                'role_id'  => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        ]);
    }
}

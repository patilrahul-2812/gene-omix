<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Admin',
                'middle_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'test@example.com',
                'mobile_no' => '1234567890',
                'password' => Hash::make('123456'),
                'status' => 1,
            ]
        ]);
    }
}
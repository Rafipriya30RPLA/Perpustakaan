<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      DB::table('users')->insert([
        'name'=>'admin',
        'email'=>'admin@gmail.com',
        'email_verified_at'=>'2023-10-16 07:15:16',
        'password'=>Hash::make('123456789'),
        'role'=> 'admin'
      ]);
    }
}

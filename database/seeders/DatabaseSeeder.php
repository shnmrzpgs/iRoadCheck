<?php

namespace Database\Seeders;

use App\Models\User;
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
            [
                'first_name' => 'John',
                'middle_name' => 'Doe',
                'last_name' => 'Admin',
                'date_of_birth' => '1990-01-01',
                'sex' => 'male',
                'email' => 'Admin@example.com',
                'password' => Hash::make('password'), // Hashing the password
                'user_type' => 1, // User type for Admin
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'middle_name' => 'D.',
                'last_name' => 'Resident',
                'date_of_birth' => '1995-02-02',
                'sex' => 'female',
                'email' => 'resident@example.com',
                'password' => Hash::make('password'), // Hashing the password
                'user_type' => 2, // User type for resident
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Report;
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
                'last_name' => 'admin',
                'date_of_birth' => '1990-01-01',
                'sex' => 'male',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Hashing the password
                'user_type' => 1, // User type for admin
                'status' => 'Active', // User status for admin
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
                'status' => 'Active', // User status for resident
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('user_roles')->insert([
            [
                'role' => 'Patcher',
            ],
            [
                'role' => 'John',
            ],
        ]);
        DB::table('severities')->insert([
            [
                'severity' => 'Shallow',
            ],
            [
                'severity' => 'Tolerable',
            ],
            [
                'severity' => 'Serious',
            ],
            [
                'severity' => 'Dangerous',
            ],
        ]);

        $this->call([
            UserSeeder::class,
            ActivityLogSeeder::class,
            ReportSeeder::class
        ]);
    }
}

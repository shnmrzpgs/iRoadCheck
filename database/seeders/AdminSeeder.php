<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if an admin user already exists
        $adminUser = DB::table('users')
            ->join('user_types', 'users.user_type', '=', 'user_types.id')
            ->where('user_types.type', 'admin')
            ->first();  // Get the first admin if it exists

        // If no admin exists, create one
        if (!$adminUser) {
            // Create the admin user
            $adminUser = User::create([
                'first_name' => 'John',
                'middle_name' => 'Doe',
                'last_name' => 'Admin',
                'date_of_birth' => '1990-01-01',
                'sex' => 'male',
                'username' => 'admin', // Admin username
                'email' => null, // No email for admin
                'password' => Hash::make('hOwArD123!'), // Hashing the password
                'user_type' => 1, // Staff type for admin
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Ensure only one admin by checking if the user already exists in the 'admins' table
        if (!DB::table('admins')->where('user_id', $adminUser->id)->exists()) {
            // Insert into the 'admins' table
            DB::table('admins')->insert([
                'user_id' => $adminUser->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

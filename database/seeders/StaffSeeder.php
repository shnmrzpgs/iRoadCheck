<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all users of type 'staff'
        $staffUsers = DB::table('users')
            ->where('user_type', 3) // staff type ID
            ->select('id') // Only select user IDs
            ->get();


        // Insert into the staffs table
        foreach ($staffUsers as $user) {
            // Assign a random role_permission ID (replace with your logic if needed)
            $rolePermission = DB::table('staff_roles_permissions')->inRandomOrder()->first();
            $staffRole = DB::table('staff_roles')->inRandomOrder()->first();
            if ($rolePermission) {
                DB::table('staffs')->insert([
                    'user_id' => $user->id,
                    'staff_roles_permissions_id' => $staffRole->id, // Reference role_permission ID
                    'username' => 'staff_' . $user->id,
                    // 'generated_password' => Str::random(10), // Generate a random password
                    'status' => 'active', // Default to active status
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

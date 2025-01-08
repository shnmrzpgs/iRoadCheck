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
            ->join('user_types', 'users.user_type', '=', 'user_types.id')
            ->where('user_types.type', 'staff')
            ->select('users.id') // Only select user IDs
            ->get();

        // Insert into the staffs table
        foreach ($staffUsers as $user) {
            // Assign a random role_permission ID (replace with your logic if needed)
            $rolePermission = DB::table('staff_roles_permissions')->inRandomOrder()->first();

            if ($rolePermission) {
                DB::table('staffs')->insert([
                    'user_id' => $user->id,
                    'staff_roles_permissions_id' => $rolePermission->id, // Reference role_permission ID
                    'generated_password' => Str::random(10), // Generate a random password
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

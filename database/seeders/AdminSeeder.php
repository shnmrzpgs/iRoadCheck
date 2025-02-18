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
        // Fetch all users of type 'staff'
        $adminUsers = DB::table('users')
            ->where('user_type', 1) // Staff type ID
            ->select('id') // Only select user IDs
            ->get();


        // Insert into the admins table
        foreach ($adminUsers as $user) {
            DB::table('admins')->insert([
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
//
//        // Insert into the admins table
//        foreach ($adminUsers as $user) {
//            // Assign a random admin role (if available)
//            $adminRole = DB::table('admin_roles')->inRandomOrder()->first();
//
//            if ($adminRole) {
//                DB::table('admins')->insert([
//                    'user_id' => $user->id,
//                    'admin_roles_id' => $adminRole->id, // Reference to admin role ID
//                    'status' => 'active', // Default to active status
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ]);
//            }
//        }
    }
}

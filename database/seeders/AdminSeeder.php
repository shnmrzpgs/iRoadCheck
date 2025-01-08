<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():  void
    {
//        Admin::factory()->count(10)->create();

        // Fetch users with 'admin' user_type
        $adminUsers = DB::table('users')
            ->join('user_types', 'users.user_type', '=', 'user_types.id')
            ->where('user_types.type', 'admin')
            ->select('users.id') // Only select user IDs
            ->get();

        // Insert into admins table
        foreach ($adminUsers as $user) {
            DB::table('admins')->insert([
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

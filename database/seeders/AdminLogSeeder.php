<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AdminLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all admins (users with user_type = 1)
        $adminUsers = DB::table('users')->where('user_type', 1)->get();

        $adminLogs = [];
        foreach ($adminUsers as $admin) {
            $adminLogs[] = [
                'admin_id' => $admin->id, // Assuming 'id' is the primary key in the users table
                'action' => 'Logged In', // Example action
                'dateTime' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert admin logs
        Schema::disableForeignKeyConstraints(); // Temporarily disable foreign key checks
        DB::table('admin_logs')->insert($adminLogs);
        Schema::enableForeignKeyConstraints(); // Re-enable foreign key checks
    }
}

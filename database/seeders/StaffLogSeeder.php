<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class StaffLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all staff (users with user_type = 3)
        $staffUsers = DB::table('users')->where('user_type', 3)->get();

        $staffLogs = [];
        foreach ($staffUsers as $staff) {
            $staffLogs[] = [
                'staff_id' => $staff->id, // Assuming 'id' is the primary key in the users table
                'action' => 'Logged In', // Example action
                'dateTime' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert staff logs
        Schema::disableForeignKeyConstraints(); // Temporarily disable foreign key checks
        DB::table('staff_logs')->insert($staffLogs);
        Schema::enableForeignKeyConstraints(); // Re-enable foreign key checks
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class ResidentLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all residents (users with user_type = 2, assuming residents are user type 2)
        $residentUsers = DB::table('users')->where('user_type', 2)->get();

        $residentLogs = [];
        foreach ($residentUsers as $resident) {
            $residentLogs[] = [
                'resident_id' => $resident->id, // Assuming 'id' is the primary key in the users table
                'action' => 'Checked In', // Example action (this can be customized)
                'dateTime' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert resident logs
        Schema::disableForeignKeyConstraints(); // Temporarily disable foreign key checks
        DB::table('resident_logs')->insert($residentLogs);
        Schema::enableForeignKeyConstraints(); // Re-enable foreign key checks
    }
}

<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminLog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminLogSeeder extends Seeder
{
    public function run(): void
    {
        // Use the factory to create 10 sample admin log records
//        AdminLog::factory()->count(20)->create();

        // Fetch all admins from the users table
        $admins = Admin::all();

        if ($admins->isEmpty()) {
            $this->command->info('No admins found in the users table. Skipping admin_logs seeding.');
            return;
        }

        // Generate sample logs
        $logs = [];
        foreach ($admins as $admin) {
            $logs[] = [
                'admin_id' => $admin->id,
                'action' => 'Performed an action',
                'dateTime' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $logs[] = [
                'admin_id' => $admin->id,
                'action' => 'Logged in',
                'dateTime' => Carbon::now()->subHours(2),
                'created_at' => Carbon::now()->subHours(2),
                'updated_at' => Carbon::now()->subHours(2),
            ];
        }

        // Insert logs into the admin_logs table
        DB::table('admin_logs')->insert($logs);

        $this->command->info('Admin logs seeded successfully!');
    }
}

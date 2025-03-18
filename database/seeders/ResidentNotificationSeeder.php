<?php

namespace Database\Seeders;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentNotificationSeeder extends Seeder
{
//
//    /**
//     * Run the database seeds.
//     */
//    public function run(): void
//    {
//        $adminUserId = 1; // Set this to an appropriate admin user ID from your database
//
//        $notifications = [
//            [
//                'admin_user_id' => $adminUserId,
//                'title' => 'Report Canceled',
//                'message' => 'Your report of the cracked road in Apokon Street, dated July 21, 2024, has been canceled.',
//                'is_read' => false,
//                'created_at' => Carbon::now()->subHours(8),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'admin_user_id' => $adminUserId,
//                'title' => 'Report Resolved',
//                'message' => 'Your report of debris on Main Avenue, dated July 20, 2024, has been resolved.',
//                'is_read' => true,
//                'created_at' => Carbon::now()->subHours(12),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'admin_user_id' => $adminUserId,
//                'title' => 'Investigation Ongoing',
//                'message' => 'Your report of a pothole near Pioneer Avenue, dated July 15, 2024, is under investigation.',
//                'is_read' => false,
//                'created_at' => Carbon::now()->subDays(2),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'admin_user_id' => $adminUserId,
//                'title' => 'Report Resolved',
//                'message' => 'Your report of a blocked drainage on Park Avenue, dated July 10, 2024, has been resolved.',
//                'is_read' => true,
//                'created_at' => Carbon::now()->subDays(5),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'admin_user_id' => $adminUserId,
//                'title' => 'Awaiting Response',
//                'message' => 'Your report of a fallen tree on Rizal Street, dated July 5, 2024, is awaiting response.',
//                'is_read' => false,
//                'created_at' => Carbon::now()->subDays(7),
//                'updated_at' => Carbon::now(),
//            ],
//        ];
//
//        foreach ($notifications as $notification) {
//            Notification::create($notification);
//        }
//    }
}

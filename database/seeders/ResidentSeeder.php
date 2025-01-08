<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all users of type 'resident'
        $residentUsers = DB::table('users')
            ->join('user_types', 'users.user_type', '=', 'user_types.id')
            ->where('user_types.type', 'resident')
            ->select('users.id') // Only select user IDs
            ->get();

        // Insert into the residents table
        foreach ($residentUsers as $user) {
            DB::table('residents')->insert([
                'user_id' => $user->id,
                'phone' => rand(1000000000, 9999999999), // Generate a random 10-digit phone number
                'remember_token' => null, // Null since it's optional
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

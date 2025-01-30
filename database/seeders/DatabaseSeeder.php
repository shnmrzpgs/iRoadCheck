<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\StaffPermission;
use App\Models\StaffRole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Howard Glen',
                'middle_name' => 'Doe',
                'last_name' => 'Gloria',
                'date_of_birth' => '1990-01-01',
                'sex' => 'male',
                'username' => 'howardGlen_admin',
                'email' => null,
                'password' => Hash::make('hOwArD123!'),
                'user_type' => 1,
                'remember_token' => null,
                'generated_password' => null, // Add this if necessary
                'email_verified_at' => null,  // Add this if necessary
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'middle_name' => 'D.',
                'last_name' => 'Resident',
                'date_of_birth' => '1995-02-02',
                'sex' => 'female',
                'username' => null,
                'email' => 'resident@example.com',
                'password' => Hash::make('password'),
                'user_type' => 2,
                'remember_token' => null,
                'generated_password' => null,
                'email_verified_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Bright',
                'middle_name' => 'D.',
                'last_name' => 'PatcherKo',
                'date_of_birth' => '1995-02-05',
                'sex' => 'female',
                'user_type' => 3,
                'email' => null,
                'username' => null,
                'password' => Hash::make('password'),
                'generated_password' => 'password',
                'remember_token' => null,
                'email_verified_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        

        DB::table('severities')->insert([
            [
                'severity' => 'Shallow',
            ],
            [
                'severity' => 'Tolerable',
            ],
            [
                'severity' => 'Serious',
            ],
            [
                'severity' => 'Dangerous',
            ],
        ]);

        $this->call([
            UserSeeder::class,
            ActivityLogSeeder::class,
            ReportSeeder::class,
            RolePermissionSeeder::class,
            AdminLogSeeder::class,
            StaffLogSeeder::class,
            ResidentLogSeeder::class,
            AdminSeeder::class,
            StaffSeeder::class,
            ResidentSeeder::class,
//            StaffRoleSeeder::class,
//            StaffPermissionSeeder::class
        ]);
    }
}

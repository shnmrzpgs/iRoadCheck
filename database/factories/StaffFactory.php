<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\StaffRolesPermissions;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    protected $model = Staff::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(), // Ensure user_id is assigned
            'staff_roles_permissions_id' => \App\Models\StaffRolesPermissions::inRandomOrder()->value('id') ?? 1,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    
}

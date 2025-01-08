<?php

namespace Database\Factories;

use App\Enums\Staff\StaffRoleStatus;
use App\Models\StaffRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffRoleFactory extends Factory
{
    protected $model = StaffRole::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([$this->faker->unique()->jobTitle]),
            'status' => $this->faker->randomElement([StaffRoleStatus::ENABLED, StaffRoleStatus::DISABLED]), // Random status from the enum
        ];
    }
}

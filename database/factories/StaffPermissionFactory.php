<?php

namespace Database\Factories;

use App\Models\StaffPermission;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffPermissionFactory extends Factory
{
    protected $model = StaffPermission::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(), // Generates a unique word for the name field
            'label' => $this->faker->word(), // Generates word for the name field
        ];
    }
}

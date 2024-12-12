<?php

namespace Database\Factories;


use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityLog>
 */
class ActivityLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = ActivityLog::class;

    public function definition(): array
    {
        return [
            'transaction_id' => $this->faker->uuid,
            'type' => $this->faker->randomElement(['Login', 'Logout', 'Data Update', 'Delete']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

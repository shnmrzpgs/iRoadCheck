<?php

namespace Database\Factories;

use App\Models\AdminLog;
use App\Models\AllUser;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AdminLogFactory extends Factory
{
/**
 * The name of the factory's corresponding model.
 *
 * @var string
 */
    protected $model = AdminLog::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
//            'admin_id' => Staff::factory(),
//            'action' => $this->faker->word(),
//            'description' => $this->faker->sentence(),
//            'date' => Carbon::create(rand(2000, 2023), rand(1, 12), rand(1, 28))->format('Y-m-d'),
        ];
    }
}

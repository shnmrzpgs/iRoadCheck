<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\StaffLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StaffLogFactory extends Factory
{
    protected $model = StaffLog::class;

    public function definition(): array
    {
        return [
//            'staff_id' => staff::factory(),
//            'action' => $this->faker->word(),
//            'dateTime' => Carbon::create(rand(2000, 2023), rand(1, 12), rand(1, 28))->format('Y-m-d'),
        ];
    }
}

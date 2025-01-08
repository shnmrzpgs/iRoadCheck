<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition(): array
    {
//        return [
//            'first_name' => $this->faker->firstName,
//            'middle_name' => $this->faker->optional()->firstName,
//            'last_name' => $this->faker->lastName,
//            'date_of_birth' => $this->faker->date('Y-m-d', '2005-01-01'),
//            'sex' => $this->faker->randomElement(['Male', 'Female']),
//            'email' => $this->faker->unique()->safeEmail,
//            'password' => Hash::make('password'), // Default password
//            'remember_token' => Str::random(10),
//            'created_at' => now(),
//            'updated_at' => now(),
//        ];
    }
}

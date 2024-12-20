<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
//    public function definition(): array
//    {
//        return [
//            'name' => fake()->name(),
//            'email' => fake()->unique()->safeEmail(),
//            'email_verified_at' => now(),
//            'password' => static::$password ??= Hash::make('password'),
//            'two_factor_secret' => null,
//            'two_factor_recovery_codes' => null,
//            'remember_token' => Str::random(10),
//            'profile_photo_path' => null,
//            'current_team_id' => null,
//        ];
//    }

    public function definition(): array
    {
        return [
//            'first_name' => $this->faker->firstName,
//            'middle_name' => $this->faker->optional()->firstName,
//            'last_name' => $this->faker->lastName,
//            'date_of_birth' => $this->faker->date('Y-m-d', '2005-01-01'),
//            'sex' => $this->faker->randomElement(['Male', 'Female']),
//            'email' => fake()->unique()->safeEmail(),
//            'password' => static::$password ??= Hash::make('password'),
//            'two_factor_secret' => null,
//            'two_factor_recovery_codes' => null,
//            'remember_token' => Str::random(10),
//            'status' => $this->faker->randomElement(['Active', 'Inactive']),
//            'user_type' => $this->faker->numberBetween(1, 2), // Adjust based on user_types table
//            'created_at' => now(),
//            'updated_at' => now(),

            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->optional()->firstName,
            'last_name' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date('Y-m-d', '2005-01-01'),
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'user_role' => $this->faker->numberBetween(1, 2),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'user_type' => $this->faker->numberBetween(1, 2), // Adjust based on your logic
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(?callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}

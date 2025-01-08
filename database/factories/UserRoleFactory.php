<?php

namespace Database\Factories;

use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserRole>
 */
class UserRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = UserRole::class;

    public function definition(): array
    {
        return [
            'role' => $this->faker->randomElement(['Patcher', 'Gravel Spreader']),
            'status' => $this->faker->randomElement(['Enabled', 'Disabled']),
            'view_dashboard' => $this->faker->boolean,
            'edit_settings' => $this->faker->boolean,
            'access_restricted_data' => $this->faker->boolean,
            'approve_request' => $this->faker->boolean,
            'assign_role' => $this->faker->boolean,
            'manage_permission' => $this->faker->boolean,
            'export_data' => $this->faker->boolean,
            'reset_password' => $this->faker->boolean,
            'manage_category' => $this->faker->boolean,
            'add_new_entry' => $this->faker->boolean,
            'manage_user' => $this->faker->boolean,
            'generate_report' => $this->faker->boolean,
            'manage_inventory' => $this->faker->boolean,
            'view_log' => $this->faker->boolean,
            'update_profile' => $this->faker->boolean,
            'delete_record' => $this->faker->boolean,
            'view_notification' => $this->faker->boolean,
            'monitor_activity' => $this->faker->boolean,
            'view_report' => $this->faker->boolean,
            'archive_data' => $this->faker->boolean,
        ];
    }
}

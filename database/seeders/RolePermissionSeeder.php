<?php

namespace Database\Seeders;

use App\Models\StaffPermission;
use App\Models\StaffRole;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the human-readable labels for permissions
        $permissionLabels = [
            'view_dashboard' => 'View Dashboard',
            'generate_reports' => 'Generate Reports',
            'view_reports' => 'View Reports',
            'update_road_defects' => 'Update Road Defects',
        ];


        // Define the raw permissions (stored in the database)
        $permissions = [
            'view_dashboard',
            'generate_reports',
            'view_reports',
            'update_road_defects',
        ];

        // Create all permissions
        foreach ($permissions as $permission) {
            StaffPermission::updateOrCreate(
                ['name' => $permission], // Ensure no duplicates
                ['label' => $permissionLabels[$permission] ?? $permission] // Store label, fallback to name
            );
        }

        // Define roles and their corresponding permissions
        $roles = [
            'Patcher' => [
                'view_dashboard',
                'generate_reports',
                'view_reports',
                'update_road_defects',
            ],
        ];

        // Loop through roles and assign permissions
        foreach ($roles as $roleName => $rolePermissions) {
            // Create or update the role
            $role = StaffRole::updateOrCreate(
                ['name' => $roleName]
            );

            // Attach the permissions to the role
            $permissions = StaffPermission::whereIn('name', $rolePermissions)->pluck('id');
            $role->permissions()->sync($permissions); // Sync ensures no duplicates
        }
    }
}

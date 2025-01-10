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
            'edit_settings' => 'Edit Settings',
            'manage_users' => 'Manage Users',
            'generate_reports' => 'Generate Reports',
            'assign_roles' => 'Assign Roles',
            'manage_inventory' => 'Manage Inventory',
        ];

        // Define permissions (raw names, which will be stored in the database)
        $permissions = [
            'view_dashboard',
            'edit_settings',
            'manage_users',
            'generate_reports',
            'assign_roles',
            'manage_inventory',
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
            'Manager' => ['view_dashboard', 'edit_settings', 'manage_users', 'generate_reports', 'assign_roles', 'manage_inventory'],
            'Supervisor' => ['view_dashboard', 'generate_reports', 'manage_inventory', 'assign_roles'],
            'Clerk' => ['view_dashboard', 'manage_inventory'],
            'Administrator' => ['view_dashboard', 'edit_settings', 'manage_users', 'assign_roles', 'generate_reports', 'manage_inventory'],
            'HR Manager' => ['view_dashboard', 'edit_settings', 'assign_roles', 'manage_users'],
            'Accountant' => ['view_dashboard', 'generate_reports', 'manage_inventory'],
            'IT Specialist' => ['view_dashboard', 'edit_settings', 'assign_roles'],
            'Salesperson' => ['view_dashboard', 'manage_inventory', 'generate_reports'],
            'Customer Support' => ['view_dashboard', 'generate_reports'],
            'Quality Analyst' => ['view_dashboard', 'generate_reports', 'manage_inventory'],
            'Operations Head' => ['view_dashboard', 'edit_settings', 'manage_inventory', 'generate_reports'],
            'Marketing Manager' => ['view_dashboard', 'generate_reports', 'assign_roles'],
            'Data Analyst' => ['view_dashboard', 'generate_reports'],
            'Product Manager' => ['view_dashboard', 'edit_settings', 'manage_inventory', 'assign_roles'],
            'Logistics Coordinator' => ['view_dashboard', 'manage_inventory', 'generate_reports'],
            'Finance Officer' => ['view_dashboard', 'generate_reports', 'edit_settings'],
            'Procurement Manager' => ['view_dashboard', 'manage_inventory', 'assign_roles'],
            'Training Specialist' => ['view_dashboard', 'assign_roles', 'generate_reports'],
            'Project Manager' => ['view_dashboard', 'edit_settings', 'manage_users', 'generate_reports'],
            'Business Analyst' => ['view_dashboard', 'generate_reports', 'assign_roles'],
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

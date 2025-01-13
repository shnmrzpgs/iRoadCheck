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
            'manage_inventory' => 'Manage Inventory',
            'create_posts' => 'Create Posts',
            'edit_posts' => 'Edit Posts',
            'delete_posts' => 'Delete Posts',
            'publish_posts' => 'Publish Posts',
            'approve_comments' => 'Approve Comments',
            'manage_categories' => 'Manage Categories',
            'view_audit_logs' => 'View Audit Logs',
            'backup_system' => 'Backup System',
            'restore_system' => 'Restore System',
            'manage_permissions' => 'Manage Permissions',
            'assign_tasks' => 'Assign Tasks',
            'complete_tasks' => 'Complete Tasks',
            'view_reports' => 'View Reports',
            'export_data' => 'Export Data',
            'import_data' => 'Import Data',
            'manage_projects' => 'Manage Projects',
            'view_finances' => 'View Finances',
            'manage_budget' => 'Manage Budget',
            'handle_customer_support' => 'Handle Customer Support',
            'configure_notifications' => 'Configure Notifications',
            'access_api' => 'Access API',
            'customize_themes' => 'Customize Themes',
            'manage_plugins' => 'Manage Plugins',
            'delete_users' => 'Delete Users',
        ];


        // Define the raw permissions (stored in the database)
        $permissions = [
            'view_dashboard',
            'edit_settings',
            'manage_users',
            'generate_reports',
            'manage_inventory',
            'create_posts',
            'edit_posts',
            'delete_posts',
            'publish_posts',
            'approve_comments',
            'manage_categories',
            'view_audit_logs',
            'backup_system',
            'restore_system',
            'manage_permissions',
            'assign_tasks',
            'complete_tasks',
            'view_reports',
            'export_data',
            'import_data',
            'manage_projects',
            'view_finances',
            'manage_budget',
            'handle_customer_support',
            'configure_notifications',
            'access_api',
            'customize_themes',
            'manage_plugins',
            'delete_users',
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
            'Manager' => ['view_dashboard', 'edit_settings', 'manage_users', 'generate_reports', 'manage_inventory'],
            'Supervisor' => ['view_dashboard', 'generate_reports', 'manage_inventory'],
            'Clerk' => ['view_dashboard', 'manage_inventory'],
            'Administrator' => ['view_dashboard', 'edit_settings', 'manage_users', 'generate_reports', 'manage_inventory'],
            'HR Manager' => ['view_dashboard', 'edit_settings', 'manage_users'],
            'Accountant' => ['view_dashboard', 'generate_reports', 'manage_inventory'],
            'IT Specialist' => ['view_dashboard', 'edit_settings'],
            'Salesperson' => ['view_dashboard', 'manage_inventory', 'generate_reports'],
            'Customer Support' => ['view_dashboard', 'generate_reports'],
            'Quality Analyst' => ['view_dashboard', 'generate_reports', 'manage_inventory'],
            'Operations Head' => ['view_dashboard', 'edit_settings', 'manage_inventory', 'generate_reports'],
            'Marketing Manager' => ['view_dashboard', 'generate_reports'],
            'Data Analyst' => ['view_dashboard', 'generate_reports'],
            'Product Manager' => ['view_dashboard', 'edit_settings', 'manage_inventory'],
            'Logistics Coordinator' => ['view_dashboard', 'manage_inventory', 'generate_reports'],
            'Finance Officer' => ['view_dashboard', 'generate_reports', 'edit_settings'],
            'Procurement Manager' => ['view_dashboard', 'manage_inventory'],
            'Training Specialist' => ['view_dashboard', 'generate_reports'],
            'Project Manager' => ['view_dashboard', 'edit_settings', 'manage_users', 'generate_reports'],
            'Business Analyst' => ['view_dashboard', 'generate_reports'],
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

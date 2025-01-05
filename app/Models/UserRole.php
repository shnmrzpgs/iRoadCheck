<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'status',
        'view_dashboard',
        'edit_settings',
        'access_restricted_data',
        'approve_request',
        'assign_role',
        'manage_permission',
        'export_data',
        'reset_password',
        'manage_category',
        'add_new_entry',
        'manage_user',
        'generate_report',
        'manage_inventory',
        'view_log',
        'update_profile',
        'delete_record',
        'view_notification',
        'monitor_activity',
        'view_report',
        'archive_data',
    ];

    public function getPermissions(): array
    {
        return collect($this->attributes)
            ->filter(function ($value, $key) {
                return $value === true && $key !== 'id' && $key !== 'role' && $key !== 'status';
            })
            ->keys()
            ->toArray();
    }
}

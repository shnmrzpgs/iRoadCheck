<?php

namespace App\Models;

use App\Enums\Staff\StaffRoleStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StaffRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public function create(array $attributes = [])
    {
        return tap($this->newModelInstance($attributes), function ($instance) {
            $instance->save();
        });
    }

    /**
     * Relationship: A Role has many Permissions.
     */
//    public function permissions(): BelongsToMany
//    {
//        return $this->belongsToMany(StaffPermission::class, 'staff_roles_permissions', 'staff_role_id', 'staff_permission_id');
//    }
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(StaffPermission::class, 'staff_roles_permissions');
    }

}

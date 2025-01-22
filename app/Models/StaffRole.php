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

    /**
     * Relationship: A Role has many Permissions.
     */

     
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(StaffPermission::class, 'staff_roles_permissions');
    }

    // public function staffRolesPermissions(): BelongsToMany
    // {
    //     return $this->belongsToMany(StaffRolesPermissions::class, 'staff_roles_permissions');
    // }

    public function staffRolesPermissions(): BelongsToMany
    {
        return $this->belongsToMany(StaffRolesPermissions::class, 'staff_role_id', 'id');
    }

}

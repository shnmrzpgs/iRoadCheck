<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StaffPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'label'
    ];

    /**
     * Relationship: A Permission belongs to many Roles.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(StaffRole::class, 'staff_roles_permissions');
    }
}

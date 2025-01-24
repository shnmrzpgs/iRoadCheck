<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\StaffRole;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StaffRolesPermissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_role_id',
        'staff_permission_id'
    ];

    // Attributes
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'staff_role_id' => 'integer',
        'staff_permission_id' => 'integer',
    ];

    //Relationships
    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class);
    }

    public function staffRole(): BelongsTo
    {
        return $this->belongsTo(StaffRole::class, 'staff_role_id', 'id');
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(StaffPermission::class, 'staff_roles_permissions', 'staff_role_id', 'staff_permission_id');
    }
}

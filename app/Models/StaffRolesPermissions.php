<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\StaffRole;

class StaffRolesPermissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_roles_id',
        'staff_permissions_id'
    ];

    // Attributes
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'staff_roles_id' => 'integer',
        'staff_permissions_id' => 'integer',
    ];

    //Relationships
    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'user_id');
    }

    public function staffRole(): BelongsTo
    {
        return $this->belongsTo(StaffRole::class);
    }

    public function permissions(): BelongsTo
    {
        return $this->belongsTo(StaffPermission::class, 'staff_permissions_id');
    }
}

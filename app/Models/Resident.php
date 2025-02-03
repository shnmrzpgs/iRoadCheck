<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resident extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'is_activated'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Attributes
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    // Scopes

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function adminLogs(): HasMany
    {
        return $this->hasMany(AdminLog::class);
    }

    public function staffRolesPermissions(): BelongsToMany
    {
        return $this->belongsToMany(StaffRolesPermissions::class, 'staff_roles_permissions_id');
    }
}

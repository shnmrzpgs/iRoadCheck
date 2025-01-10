<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'staff_roles_permissions_id',
        'generated password',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'staffs';

    // Attributes
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'staff_roles_permissions_id' => 'integer',
    ];

    //Relationships
    public function staffRolesPermissions(): BelongsTo
    {
        return $this->belongsTo(StaffRolesPermissions::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(StaffRole::class, 'staff_roles_permissions');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

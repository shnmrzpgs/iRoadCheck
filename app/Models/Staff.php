<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'staff_roles_permissions_id',
        'generated password'
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
        'staff_roles_permissions_id' => 'integer',
    ];

    //Relationships
    public function staffRolesPermissions(): BelongsToMany
    {
        return $this->belongsToMany(StaffRolesPermissions::class, 'staff_roles_permissions_id');
    }
}

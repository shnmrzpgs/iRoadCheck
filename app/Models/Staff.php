<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function staffLogs(): HasMany
    {
        return $this->hasMany(StaffLog::class);
    }

    public function staffRolesPermissions(): BelongsToMany
    {
        return $this->belongsToMany(StaffRolesPermissions::class, 'staff_roles_permissions_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use Notifiable; use HasFactory;

    protected $fillable = [
        'user_id',
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

    public function profilePhoto(): HasOne
    {
        return $this->hasOne(UserProfilePhoto::class);
    }

    public function notifications(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }


}

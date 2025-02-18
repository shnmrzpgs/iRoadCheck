<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StaffLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_id',
        'action',
        'dateTime',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'log_id' => 'integer',
        'staff_id' => 'integer',
        'dateTime' => 'timestamp',
    ];

    // Attributes

    // Scopes

    // Relationships
    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class, 'staff_id'); // Ensure this matches your setup
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function profilePhoto(): HasOne
    {
        return $this->hasOne(UserProfilePhoto::class);
    }

}

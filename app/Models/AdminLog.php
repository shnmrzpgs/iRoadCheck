<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AdminLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'action',
        'dateTime', // or 'dateAndTime' if using that column
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'log_id' => 'integer',
        'admin_id' => 'integer',
        'dateTime' => 'timestamp',
    ];

    protected $primaryKey = 'log_id';


    // Attributes


    // Scopes

    // Relationship with the Admin or Staff model
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id'); // Ensure this matches your setup
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


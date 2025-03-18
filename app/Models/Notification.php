<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Notification extends Model
{
    protected $fillable = [
        'notifiable_id',      // Polymorphic ID (e.g., user ID, staff ID, etc.)
        'notifiable_type',    // Polymorphic type (e.g., User::class, Staff::class)
        'report_id',
        'title',
        'message',
        'is_read',
    ];

    /**
     * Polymorphic Relationship: Notification belongs to multiple models.
     */
    public function notifiable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'notifiable_id');
    }


//    public function admin(): BelongsTo
//    {
//        return $this->belongsTo(User::class, 'admin_user_id');
//    }
//
//    public function staff(): BelongsTo
//    {
//        return $this->belongsTo(User::class, 'staff_user_id');
//    }
//
//    public function resident(): BelongsTo
//    {
//        return $this->belongsTo(User::class, 'resident_user_id');
//    }

}

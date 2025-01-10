<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    // Attributes

    // Scopes

    // Relationship with the Admin or User model
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id'); // Ensure this matches your setup
    }
}

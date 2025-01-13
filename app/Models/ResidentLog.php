<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResidentLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resident_id',
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
        'resident_id' => 'integer',
        'dateTime' => 'timestamp',
    ];

    // Attributes

    // Scopes

    // Relationships
    public function resident(): BelongsTo
    {
        return $this->belongsTo(User::class, 'resident_id'); // Ensure this matches your setup
    }


}

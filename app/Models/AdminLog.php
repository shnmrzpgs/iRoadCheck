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
        'date',
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

    // Relationships
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}

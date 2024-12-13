<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    // Table name (if not following Laravel's naming convention)
    protected $table = 'activity_logs';

    // Mass assignable fields
    protected $fillable = [
        'transaction_id',
        'type',
    ];

    // Date fields for automatic casting
    protected array $dates = [
        'created_at',
        'updated_at',
    ];

}

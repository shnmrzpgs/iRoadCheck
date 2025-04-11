<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $fillable = [
        'reporter_id',
        'defect',
        'lat',
        'lng',
        'location',
        'street',
        'purok',
        'barangay',
        'city',
        'date',
        'time',
        'severity',
        'image',
        'image_annotated',
        'status',
        'report_count',
        'updated_image',
        'updater_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date' => 'date',
    ];

    public function severity(): BelongsTo
    {
        return $this->belongsTo(Severity::class, 'label');
    }
    public function suggestions()
    {
        return $this->hasMany(Suggestion::class, 'report_id');
    }
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

}

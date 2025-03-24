<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'updated_image'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date' => 'date',
    ];

    public function severity()
    {
        return $this->belongsTo(Severity::class);
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

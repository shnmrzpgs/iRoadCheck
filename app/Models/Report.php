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
        'date',
        'time',
        'severity',
        'image',
        'image_annotated',
        'status'
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
}

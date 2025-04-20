<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = [
        'report_id',
        'reporter_id',
        'is_match',
        'response_deadline',
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
        'label',
        'image',
        'image_annotated',
        'status'
    ];
    public function severity()
    {
        return $this->belongsTo(Severity::class);
    }
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}

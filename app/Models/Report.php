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
    public function severity()
    {
        return $this->belongsTo(Severity::class);
    }
}

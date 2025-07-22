<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'farm_id', 'activity_type', 'related_type', 'related_id',
        'date', 'start_time', 'end_time', 'description',
        'assigned_to', 'status', 'notes'
    ];

   protected $casts = [
    'date' => 'date',
];


    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function related()
    {
        return $this->morphTo();
    }

    public function assignedStaff()
    {
        return $this->belongsTo(Staff::class, 'assigned_to');
    }




}

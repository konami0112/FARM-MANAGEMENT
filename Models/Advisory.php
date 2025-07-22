<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisory extends Model
{
    use HasFactory;

    protected $fillable = [
        'farm_id', 'title', 'content', 'advisor_id', 'issue_date',
        'due_date', 'priority', 'status', 'response'
    ];


 protected $casts = [
    'issue_date' => 'date',
    'due_date' => 'date'
];


    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function advisor()
    {
        return $this->belongsTo(Staff::class, 'advisor_id');
    }
}

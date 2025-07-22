<?php

// app/Models/Department.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'type',
        'description',
        'hod_id',
        'status'
    ];

    // Relationship to HOD (Head of Department)
    public function hod()
    {
        return $this->belongsTo(Staff::class, 'hod_id')->withDefault([
            'name' => 'Not Assigned',
            'profile_picture' => null
        ]);
    }

    // Relationship to all staff in this department
    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class, 'department_id');
    }
}

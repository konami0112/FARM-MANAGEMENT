<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'location', 'size', 'description', 'manager_id', 'is_active'
    ];


 protected $casts = [
    'planting_date' => 'datetime',
    'record' => 'datetime',
];

    public function manager()
    {
        return $this->belongsTo(Staff::class, 'manager_id');
    }

    public function crops()
    {
        return $this->hasMany(Crop::class);
    }

    public function livestock()
    {
        return $this->hasMany(Livestock::class);
    }

    public function financialRecords()
    {
        return $this->hasMany(FinancialRecord::class);
    }

    public function marketLinkages()
    {
        return $this->hasMany(MarketLinkage::class);
    }

    public function advisories()
    {
        return $this->hasMany(Advisory::class);
    }

    public function activities()
    {
        return $this->hasMany(FarmActivity::class);
    }
}

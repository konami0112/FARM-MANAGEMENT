<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'variety', 'farm_id', 'planting_date', 'harvest_date',
        'planted_area', 'expected_yield', 'actual_yield', 'status', 'notes'
    ];

    protected $dates = ['planting_date', 'harvest_date'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function activities()
    {
        return $this->morphMany(FarmActivity::class, 'related');
    }

    public function marketLinkages()
    {
        return $this->morphMany(MarketLinkage::class, 'product');
    }
}

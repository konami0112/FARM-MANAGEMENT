<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'breed', 'farm_id', 'quantity', 'acquisition_date',
        'purpose', 'health_status', 'notes'
    ];

    protected $dates = ['acquisition_date'];

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

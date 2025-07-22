<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'farm_id', 'transaction_type', 'category', 'amount', 'date',
        'description', 'payment_method', 'reference', 'recorded_by'
    ];

    protected $dates = ['date'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function recorder()
    {
        return $this->belongsTo(Staff::class, 'recorded_by');
    }
}

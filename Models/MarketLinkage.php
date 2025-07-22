<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketLinkage extends Model
{
    use HasFactory;

    protected $fillable = [
        'farm_id', 'buyer_name', 'contact_person', 'contact_email',
        'contact_phone', 'product_type', 'product_subtype', 'product_id', 'product_category',
        'quantity', 'unit', 'price_per_unit', 'agreement_date',
        'delivery_date', 'status', 'notes'
    ];

protected $casts = [
    'agreement_date' => 'date',
    'delivery_date' => 'date',
];


    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }


    public function product()
{
    return $this->morphTo('product', 'product_type', 'product_id');
}




// Helper method to get product name
public function getProductNameAttribute()
{
    return $this->product_subtype ?? class_basename($this->product);
}



}

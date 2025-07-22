<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextSummarization extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_text',
        'summary_text',
        'model_used',
        'domain',
        'compression_ratio',
        'evaluation_metrics',
        'type',
        'user_id'
    ];

    protected $casts = [
        'evaluation_metrics' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

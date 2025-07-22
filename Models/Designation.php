<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{

    protected $fillable = ['name'];

     public $timestamps = true;





public function staff()
{
    return $this->hasMany(Staff::class);
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{

    protected $table = 'variations';
    protected $guarded=[];



    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function options()
    {
        return $this->hasMany(VariationOption::class);
    }

}

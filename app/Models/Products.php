<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Products extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'products';
    protected $guarded=[];

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_product');
    }
    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
    public function options()
    {
        return $this->hasMany(VariationOption::class);
    }
    public function items()
    {
        return $this->hasMany(Items::class);
    }
}

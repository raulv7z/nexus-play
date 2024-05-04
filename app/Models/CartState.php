<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartState extends Model
{
    use HasFactory;

    protected $fillable = ['state'];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
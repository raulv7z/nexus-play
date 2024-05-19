<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'cart_state_id', 'iva', 'base_amount', 'full_amount', 'purchased_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entries()
    {
        return $this->hasMany(CartEntry::class);
    }

    public function cartState()
    {
        return $this->belongsTo(CartState::class);
    }

    public function getBaseAmountAttribute($value)
    {
        return number_format($value, 2);
    }

    public function getFullAmountAttribute($value)
    {
        return number_format($value, 2);
    }
}
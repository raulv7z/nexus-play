<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'cart_state_id', 'base_amount', 'full_amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoices()
    {
        return $this->hasOne(Invoice::class);
    }

    public function entries()
    {
        return $this->hasMany(CartEntry::class);
    }

    public function cartState()
    {
        return $this->belongsTo(CartState::class);
    }

    // not needed, in db is decimal(10,2)
    
    // public function getBaseAmountAttribute($value)
    // {
    //     return round($value, 2);
    // }

    // public function getFullAmountAttribute($value)
    // {
    //     return round($value, 2);
    // }
}
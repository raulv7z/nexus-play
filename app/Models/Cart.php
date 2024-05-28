<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'cart_state_id', 'iva', 'base_amount', 'full_amount'];

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

    public function getIvaAttribute($value)
    {
        return number_format($value, 2);
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
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartEntry extends Model
{
    use HasFactory;
    
    protected $table = 'cart_entries';
    protected $fillable = ['cart_id', 'edition_id', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }
}

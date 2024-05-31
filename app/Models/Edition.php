<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edition extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['platform_id', 'videogame_id', 'amount', 'stock'];

    public function videogame()
    {
        return $this->belongsTo(Videogame::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function cartEntries()
    {
        return $this->hasMany(CartEntry::class);
    }

    public function invoiceEntries()
    {
        return $this->hasMany(InvoiceEntry::class);
    }

    // Accessor to format amount to 2 decimal places
    public function getAmountAttribute($value)
    {
        return number_format($value, 2);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cart_id',
        'invoice_number',
        'issued_at',
        'base_amount',
        'total_amount',
        'currency',
    ];

    protected $dates = ['issued_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function entries()
    {
        return $this->hasMany(InvoiceEntry::class);
    }

    /**
     * Get the issued_at attribute in d/m/Y format.
     *
     * @param  string  $value
     * @return string
     */
    public function getIssuedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
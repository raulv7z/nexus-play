<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'cart_id',
        'code_invoice',
        'issued_at',
        'base_amount',
        'full_amount',
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
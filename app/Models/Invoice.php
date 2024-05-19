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
        'invoice_number',
        'issued_at',
        'total_amount',
        'currency',
    ];

    protected $dates = ['issued_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
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
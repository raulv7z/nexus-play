<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceEntry extends Model
{
    use HasFactory;
    
    protected $table = 'invoice_entries';
    protected $fillable = ['invoice_id', 'edition_id', 'videogame_name', 'platform_name', 'quantity', 'unit_amount'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }
}

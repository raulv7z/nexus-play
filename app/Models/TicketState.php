<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketState extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['state'];
    public $translatable = ['state'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
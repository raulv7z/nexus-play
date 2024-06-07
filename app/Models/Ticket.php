<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ticket_state_id',
        'ticket_code',
        'name',
        'email',
        'message',
        'issued_at'
    ];

    public function ticketState()
    {
        return $this->belongsTo(TicketState::class);
    }
}

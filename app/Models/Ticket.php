<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ticket_state_id',
        'code_ticket',
        'name',
        'email',
        'message',
        'issued_at'
    ];

    protected $appends = ['ticket_state_name'];
    protected $dates = ['issued_at'];

    public function getTicketStateNameAttribute()
    {
        return $this->ticketState ? $this->ticketState->state : 'N/A';
    }

    public function getIssuedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function ticketState()
    {
        return $this->belongsTo(TicketState::class);
    }
}

<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketReplyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $reply;

    /**
     * Create a new message instance.
     */
    public function __construct(Ticket $ticket, string $reply)
    {
        $this->ticket = $ticket;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('components.emails.ticket-reply')
                    ->subject(__("Reply") . ' - #' . $this->ticket->code_ticket)
                    ->with([
                        'ticket' => $this->ticket,
                        'reply' => $this->reply,
                    ]);
    }
}
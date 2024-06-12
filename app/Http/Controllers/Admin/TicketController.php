<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendTicketResponseRequest;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Mail\TicketReplyEmail;
use App\Models\Ticket;
use App\Models\TicketState;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function create()
    {
        return view('content.admin.tickets.create');
    }

    public function store(StoreTicketRequest $request)
    {
        $validated = $request->validated();
        $ticket = Ticket::create($validated);

        return redirect()->route('admin.tickets.manager')->with('success', 'Record created successfully.');
    }

    public function show($id)
    {
        $ticket = Ticket::withTrashed()->findOrFail($id);
        $allTicketStates = TicketState::all();

        return view('content.admin.tickets.show', compact('ticket', 'allTicketStates'));
    }

    public function edit($id)
    {
        $ticket = Ticket::withTrashed()->findOrFail($id);
        $allTicketStates = TicketState::all();

        return view('content.admin.tickets.edit', compact('ticket', 'allTicketStates'));
    }

    public function update(UpdateTicketRequest $request, $id)
    {
        $ticket = Ticket::withTrashed()->findOrFail($id);
        $ticket->update($request->validated());

        if ($ticket->trashed() && $request->has('restore') && $request->restore) {
            $ticket->restore();
        }

        return redirect()->route('admin.tickets.manager')->with('success', 'Record updated successfully.');
    }

    public function delete($id)
    {
        $ticket = Ticket::withTrashed()->findOrFail($id);
        $allTicketStates = TicketState::all();

        if ($ticket->trashed()) {
            return redirect()->route('admin.tickets.manager')->with('error', 'This record is already deleted. You have been redirected to manager.');
        }

        return view('content.admin.tickets.delete', compact('ticket', 'allTicketStates'));
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('admin.tickets.manager')->with('success', 'Record deleted successfully.');
    }

    public function reply($id)
    {
        $ticket = Ticket::withTrashed()->findOrFail($id);
        $closedTicketState = TicketState::where('state->en', 'Closed')->firstOrFail();

        if ($ticket->ticket_state_id == $closedTicketState->id) {
            return redirect()->route('admin.tickets.manager')->with('error', 'This ticket is closed. You can not reply it unless you re-open before.');
        }

        if ($ticket->trashed()) {
            return redirect()->route('admin.tickets.manager')->with('error', 'This ticket is deleted. You can not reply it unless you restore before.');
        }

        return view('content.admin.tickets.reply', compact('ticket'));
    }

    public function sendResponse(SendTicketResponseRequest $request, $id)
    {

        $ticket = Ticket::withTrashed()->findOrFail($id);
        $reply = $request->reply;
        $contactMail = $ticket->email;

        try {
            // Contact with sender
            Mail::to($contactMail)->send(new TicketReplyEmail($ticket, $reply));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send reply mail. Please, try again later.');
        }
        
        // Close the ticket
        if ($request->has('close')) {
            $closedTicketState = TicketState::where('state->en', 'Closed')->firstOrFail();
            $ticket->ticket_state_id = $closedTicketState->id;
            $ticket->save();
        }

        return redirect()->route('admin.tickets.manager')->with('success', 'Ticket replied successfully.');
    }
}

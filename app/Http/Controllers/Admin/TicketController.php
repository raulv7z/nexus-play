<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use App\Models\TicketState;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Mail\TicketEmail;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function contactUs(Request $request)
    {
        return view('content.root.company.contact-us');
    }

    public function openTicket(StoreTicketRequest $request)
    {

        $validated = $request->validated();

        if (!$validated) {
            return back()->withErrors($validated->errors())->withInput();
        }

        try {
            $ticket = Ticket::create($validated);
            $supportMail = config('mail.from.address');
            Mail::to($supportMail)->send(new TicketEmail($ticket));
            return back()->with('status', 'contact-message-sent');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to contact. Please try again later.');
        }
    }
}

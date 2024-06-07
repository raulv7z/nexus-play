<?php
namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function contactUs(Request $request)
    {
        return view('content.root.company.contact-us');
    }

    public function sendContactMessage() {

        // lógica de envío del mensaje de contacto
        
        return back()->with('status', 'contact-message-sent');
    }
}

<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Edition;
use App\Models\CartState;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Request $request)
    {
        // Determinar la ruta de redireccionamiento según el rol del usuario
        $redirectRoute = $request->user() && $request->user()->hasRole('admin')
            ? 'admin.dashboard'
            : 'root.dashboard';

        // Crear el objeto de redirección
        $redirect = redirect()->route($redirectRoute);

        // Propagar mensajes de sesión específicos
        if ($request->session()->has('success')) {
            $redirect->with('success', $request->session()->get('success'));
        }
        if ($request->session()->has('error')) {
            $redirect->with('error', $request->session()->get('error'));
        }
        if ($request->session()->has('status')) {
            $redirect->with('status', $request->session()->get('status'));
        }

        return $redirect;
    }
}

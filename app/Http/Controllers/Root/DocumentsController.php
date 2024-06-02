<?php

namespace App\Http\Controllers\Root;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DocumentsController extends Controller
{
    //

    public function index()
    {
        $path = public_path('docs/index.html');

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}

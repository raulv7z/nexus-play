<?php
namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $language = $request->input('locale');

        if (in_array($language, ['en', 'es'])) {
            Session::put('locale', $language);
        }

        return back();
    }
}

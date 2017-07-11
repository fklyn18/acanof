<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App;
use Lang;

class LanguageController extends Controller
{
    /**
     * @descr To change the current language
     * @param Request $request
     * @request Ajax
     * @return string
     */
    public function changeLanguage(Request $request)
    {
        if ($request->ajax()){
            $request->session()->put('locale', $request->locale);
            $request->session()->flash('alert-success', ('app.Locale_Change_Success'));
        }
    }
}

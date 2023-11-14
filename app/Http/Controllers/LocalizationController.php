<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LocalizationController extends Controller
{
    public function setLanguage (Request $request)
    {
        $locale = $request->language ?? 'nl';

        Cookie::queue('locale', $locale, 60 * 24 * 365);

        return redirect()->back();
    }
}

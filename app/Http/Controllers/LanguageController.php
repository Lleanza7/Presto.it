<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LanguageController extends Controller
{
    public function setLanguage($lang)
    {
        if (in_array($lang, ['en', 'es', 'it'])) {
            
            session()->put('locale', $lang);
        }
        return redirect()->back();
    }
}
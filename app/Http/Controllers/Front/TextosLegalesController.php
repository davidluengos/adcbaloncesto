<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextosLegalesController extends Controller
{
    public function avisoLegal()
    {
        $title = 'Aviso Legal';
        return view('front.avisolegal', compact('title'));
    }

    public function politicaCookies()
    {
        $title = 'Política de Cookies';
        return view('front.politicacookies', compact('title'));
    }

    public function politicaPrivacidad()
    {
        $title = 'Política de Privacidad';
        return view('front.politicaprivacidad', compact('title'));
    }
}

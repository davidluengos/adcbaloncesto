<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeccionesController extends Controller
{
    // Mostrar sección sobre nosotros
    public function nosotros()
    {
        $title = "Nuestro Club";
        return view('front.nosotros', compact('title'));
    }
}

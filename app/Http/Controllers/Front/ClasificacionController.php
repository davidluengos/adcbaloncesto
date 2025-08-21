<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Clasificacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClasificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $clasificacion = Clasificacion::obtener_clasificacion();
        unset($clasificacion[0], $clasificacion[1], $clasificacion[2]);
        $title = 'Clasificación';
        return view('front.clasificacion', compact('title', 'clasificacion'));
    }
}

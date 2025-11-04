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
        $clasificacion = Clasificacion::obtener_clasificacion_primera_masculino();

        $title = 'Clasificación';
        return view('front.clasificacion', compact('title', 'clasificacion'));
    }
}

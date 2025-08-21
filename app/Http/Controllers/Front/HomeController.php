<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Jugadore;
use App\Models\Partido;
use App\Models\Patrocinadore;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $proximoPartido = Partido::where('fecha', '>' , now())->orderBy('fecha')->first();
        $ultimosPartidos = Partido::where('fecha', '<' , now())->orderBy('fecha', 'desc')->take(3)->get();
        $jugadorasPrimerEquipo = Jugadore::where('equipo_id', 3)->where('rol_id', 1)->where('activo', 1)->orderBy('numero')->get();
        $staffPrimerEquipo = Jugadore::where('equipo_id', 3)->where('rol_id', "!=", 1)->where('activo', 1)->orderBy('id')->get();
        //$patrocinadoresPrincipales = Patrocinadore::where('tipo_patrocinador_id',  3)->get();
        //$patrocinadoresInstitucionales = Patrocinadore::where('tipo_patrocinador_id', 4)->get();
        //$patrocinadoresNormales = Patrocinadore::where('tipo_patrocinador_id', 5)->get();
        $title = 'Inicio';
        return view('front.home', compact('title', 'proximoPartido', 'ultimosPartidos', 'jugadorasPrimerEquipo', 'staffPrimerEquipo'));
    }
}

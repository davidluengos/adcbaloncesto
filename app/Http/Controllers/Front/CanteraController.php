<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Patrocinadore;
use Illuminate\Http\Request;

class CanteraController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $title = 'Cantera';
        $patrocinadores = Patrocinadore::all();
        return view('front.cantera', compact('title', 'patrocinadores'));
    }
}

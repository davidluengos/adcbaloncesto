<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Patrocinadore;
use Illuminate\Http\Request;

class AvisoLegalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $title = 'Aviso Legal';
        return view('front.avisolegal', compact('title'));
    }
}

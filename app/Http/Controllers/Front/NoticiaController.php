<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, String $slug)
    {
        //$slug = $noticia->slug;
        $noticia = Noticia::where('slug', $slug)->firstOrFail();
        $title = $noticia->titulo;
        return view('front.noticia', compact('title', 'noticia', 'slug'));
    }
}

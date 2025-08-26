<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NoticiasController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $title = 'Noticias';


        // Posts normalizados
        $posts = Post::select('id', 'title as titulo', 'body as contenido', 'createdat as fecha')
            ->get();

        // Noticias normalizadas
        $noticias = Noticia::select('id', 'titulo', 'contenido', 'fecha', 'imagen', 'slug')
            ->get();

        // Unificamos en una sola colección
        $items = $posts->merge($noticias)->sortByDesc('fecha')->values();

        // Paginación manual
        $perPage = 5; // cantidad por página
        $currentPage = request()->get('page', 1);
        $currentItems = $items->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginatedItems = new LengthAwarePaginator(
            $currentItems,
            $items->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('front.noticias', [
            'title' => $title,
            'items' => $paginatedItems
        ]);
    }
}

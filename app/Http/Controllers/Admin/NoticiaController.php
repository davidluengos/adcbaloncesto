<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class NoticiaController
 * @package App\Http\Controllers
 */
class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::paginate();

        return view('admin.noticia.index', compact('noticias'))
            ->with('i', (request()->input('page', 1) - 1) * $noticias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noticia = new Noticia();
        return view('admin.noticia.create', compact('noticia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Noticia::$rules);

        $noticia = Noticia::create($request->all());

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreOriginal = $file->getClientOriginalName();
            $numeroConCeros = str_pad($noticia->id, 4, "0", STR_PAD_LEFT);
            $noticia->imagen = '/storage/img/noticias/'. $numeroConCeros. '-'.$nombreOriginal;
            $file->move(public_path() . '/storage/img/noticias/' , $numeroConCeros. '-'.$nombreOriginal);
            $noticia->save();
        }

        $noticia->slug = Str::slug($noticia->titulo, '-');
        $noticia->save();

        return redirect()->route('noticias.index')
            ->with('success', 'Noticia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::find($id);

        return view('admin.noticia.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);

        return view('admin.noticia.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Noticia $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        request()->validate(Noticia::$rules);

        $noticia->update($request->all());

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreOriginal = $file->getClientOriginalName();
            $numeroConCeros = str_pad($noticia->id, 4, "0", STR_PAD_LEFT);
            $noticia->imagen = '/storage/img/noticias/'. $numeroConCeros. '-'.$nombreOriginal;
            $file->move(public_path() . '/storage/img/noticias/' , $numeroConCeros. '-'.$nombreOriginal);
            $noticia->save();
        }

        return redirect()->route('noticias.index')
            ->with('success', 'Noticia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id)->delete();

        return redirect()->route('noticias.index')
            ->with('success', 'Noticia deleted successfully');
    }
}

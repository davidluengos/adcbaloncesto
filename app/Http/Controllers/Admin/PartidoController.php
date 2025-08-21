<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Equipo;
use App\Models\Partido;
use Illuminate\Http\Request;

/**
 * Class PartidoController
 * @package App\Http\Controllers
 */
class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partido::where('id', '>', 0)
            ->orderBy('fecha', 'desc')
            ->paginate();

        return view('admin.partido.index', compact('partidos'))
            ->with('i', (request()->input('page', 1) - 1) * $partidos->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSinResultados()
    {
        $partidos = Partido::where('resultado_local', null)
            ->orderBy('fecha', 'asc')
            ->paginate();

        return view('admin.partido.index', compact('partidos'))
            ->with('i', (request()->input('page', 1) - 1) * $partidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all()->pluck('nombre', 'id');
        $categorias = Categoria::all()->pluck('nombre', 'id');
        $partido = new Partido();
        return view('admin.partido.create', compact('partido', 'equipos', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Partido::$rules);

        $partido = Partido::create($request->all());

        return redirect()->route('partidos.index')
            ->with('success', 'Partido created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partido = Partido::find($id);

        return view('admin.partido.show', compact('partido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipos = Equipo::all()->pluck('nombre', 'id');
        $categorias = Categoria::all()->pluck('nombre', 'id');
        $partido = Partido::find($id);

        return view('admin.partido.edit', compact('partido', 'equipos', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Partido $partido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partido $partido)
    {
        request()->validate(Partido::$rules);

        $partido->update($request->all());

        return redirect()->route('partidos.index')
            ->with('success', 'Partido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $partido = Partido::find($id)->delete();

        return redirect()->route('partidos.index')
            ->with('success', 'Partido deleted successfully');
    }
}

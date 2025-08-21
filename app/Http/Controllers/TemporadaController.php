<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    //

    public function index()
    {
        $temporadas = Temporada::paginate();

        return view('temporada.index', compact('temporadas'))
            ->with('i', (request()->input('page', 1) - 1) * $temporadas->perPage());
    }

    public function create()
    {
        $temporada = new Temporada();
        return view('temporada.create', compact('temporada'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'temporada' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        Temporada::create($request->all());

        return redirect()->route('temporada.index')
            ->with('success', 'Temporada creada correctamente.');
    }

    public function show(Temporada $temporada)
    {
        return view('temporada.show', compact('temporada'));
    }

    public function edit(Temporada $temporada)
    {
        return view('temporada.edit', compact('temporada'));
    }

    public function update(Request $request, Temporada $temporada)
    {
        $request->validate([
            'temporada' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $temporada->update($request->all());

        return redirect()->route('temporada.index')
            ->with('success', 'Temporada actualizada correctamente.');
    }

    public function destroy(Temporada $temporada)
    {
        $temporada->delete();

        return redirect()->route('temporada.index')
            ->with('success', 'Temporada eliminada correctamente.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Equipo;
use App\Models\Genero;
use Illuminate\Http\Request;

/**
 * Class EquipoController
 * @package App\Http\Controllers
 */
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::paginate();

        return view('admin.equipo.index', compact('equipos'))
            ->with('i', (request()->input('page', 1) - 1) * $equipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::all()->pluck('nombre', 'id');
        $categorias = Categoria::all()->pluck('nombre', 'id');
        $equipo = new Equipo();
        return view('admin.equipo.create', compact('equipo', 'categorias', 'generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Equipo::$rules);
        $equipo = Equipo::create($request->all());

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreOriginal = $file->getClientOriginalName();
            
            $equipo->imagen = '/storage/img/equipos/'.$equipo->id.'/' . $nombreOriginal;
            $file->move(public_path() . '/storage/img/equipos/' . $equipo->id.'/' , $nombreOriginal);
            $equipo->save();
        }

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);

        return view('admin.equipo.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $generos = Genero::all()->pluck('nombre', 'id');
        $categorias = Categoria::all()->pluck('nombre', 'id');
        $equipo = Equipo::find($id);

        return view('admin.equipo.edit', compact('equipo', 'categorias', 'generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Equipo $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        request()->validate(Equipo::$rules);

        $equipo->update($request->all());

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreOriginal = $file->getClientOriginalName();
            
            $equipo->imagen = '/storage/img/equipos/'.$equipo->id.'/' . $nombreOriginal;
            $file->move(public_path() . '/storage/img/equipos/' . $equipo->id.'/' , $nombreOriginal);
            $equipo->save();
        }

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id)->delete();

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Models\Jugadore;
use App\Models\Posicione;
use App\Models\Role;
use Illuminate\Http\Request;

/**
 * Class JugadoreController
 * @package App\Http\Controllers
 */
class JugadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores = Jugadore::paginate();

        return view('admin.jugadore.index', compact('jugadores'))
            ->with('i', (request()->input('page', 1) - 1) * $jugadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posiciones = Posicione::all()->pluck('nombre', 'id');
        $equipos = Equipo::all()->pluck('nombre', 'id');
        $roles = Role::all()->pluck('nombre', 'id');
        $jugadore = new Jugadore();
        return view('admin.jugadore.create', compact('jugadore', 'posiciones', 'equipos', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Jugadore::$rules);

        $jugadore = Jugadore::create($request->all());

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreOriginal = $file->getClientOriginalName();
            
            $jugadore->imagen = '/storage/img/equipos/'.$jugadore->equipo_id.'/'.$nombreOriginal;
            $file->move(public_path() . '/storage/img/equipos/' . $jugadore->equipo_id.'/' , $nombreOriginal);
            $jugadore->save();
        }

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugadore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugadore = Jugadore::find($id);

        return view('admin.jugadore.show', compact('jugadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jugadore = Jugadore::find($id);
        $posiciones = Posicione::all()->pluck('nombre', 'id');
        $equipos = Equipo::all()->pluck('nombre', 'id');
        $roles = Role::all()->pluck('nombre', 'id');
        return view('admin.jugadore.edit', compact('jugadore', 'posiciones', 'equipos', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Jugadore $jugadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jugadore $jugadore)
    {
        request()->validate(Jugadore::$rules);

        $jugadore->update($request->all());

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreOriginal = $file->getClientOriginalName();
            
            $jugadore->imagen = '/storage/img/equipos/'.$jugadore->equipo_id.'/'.$nombreOriginal;
            $file->move(public_path() . '/storage/img/equipos/' . $jugadore->equipo_id.'/' , $nombreOriginal);
            $jugadore->save();
        }
        
        return redirect()->route('jugadores.index')
            ->with('success', 'Jugadore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jugadore = Jugadore::find($id)->delete();

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugadore deleted successfully');
    }
}

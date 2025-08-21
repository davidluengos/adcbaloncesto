<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patrocinadore;
use App\Models\PatrocinadorTipo;
use Illuminate\Http\Request;

/**
 * Class PatrocinadoreController
 * @package App\Http\Controllers
 */
class PatrocinadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patrocinadores = Patrocinadore::paginate();

        return view('admin.patrocinadore.index', compact('patrocinadores'))
            ->with('i', (request()->input('page', 1) - 1) * $patrocinadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patrocinadoresTipos = PatrocinadorTipo::all()->pluck('nombre', 'id');
        $patrocinadore = new Patrocinadore();
        return view('admin.patrocinadore.create', compact('patrocinadore', 'patrocinadoresTipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Patrocinadore::$rules);

        $patrocinadore = Patrocinadore::create($request->all());

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreOriginal = $file->getClientOriginalName();
            
            $patrocinadore->imagen = '/storage/img/patrocinadores/' . $nombreOriginal;
            $file->move(public_path() . '/storage/img/patrocinadores/' , $nombreOriginal);
            $patrocinadore->save();
        }

        return redirect()->route('patrocinadores.index')
            ->with('success', 'Patrocinadore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patrocinadore = Patrocinadore::find($id);

        return view('admin.patrocinadore.show', compact('patrocinadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patrocinadoresTipos = PatrocinadorTipo::all()->pluck('nombre', 'id');
        $patrocinadore = Patrocinadore::find($id);

        return view('admin.patrocinadore.edit', compact('patrocinadore', 'patrocinadoresTipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Patrocinadore $patrocinadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patrocinadore $patrocinadore)
    {
        request()->validate(Patrocinadore::$rules);

        $patrocinadore->update($request->all());

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreOriginal = $file->getClientOriginalName();
            
            $patrocinadore->imagen = '/storage/img/patrocinadores/' . $nombreOriginal;
            $file->move(public_path() . '/storage/img/patrocinadores/' , $nombreOriginal);
            $patrocinadore->save();
        }

        return redirect()->route('patrocinadores.index')
            ->with('success', 'Patrocinadore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $patrocinadore = Patrocinadore::find($id)->delete();

        return redirect()->route('patrocinadores.index')
            ->with('success', 'Patrocinadore deleted successfully');
    }
}

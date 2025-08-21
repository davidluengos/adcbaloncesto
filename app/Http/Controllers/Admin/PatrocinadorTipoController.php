<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PatrocinadorTipo;
use Illuminate\Http\Request;

/**
 * Class PatrocinadorTipoController
 * @package App\Http\Controllers
 */
class PatrocinadorTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patrocinadorTipos = PatrocinadorTipo::paginate();

        return view('admin.patrocinador-tipo.index', compact('patrocinadorTipos'))
            ->with('i', (request()->input('page', 1) - 1) * $patrocinadorTipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patrocinadorTipo = new PatrocinadorTipo();
        return view('admin.patrocinador-tipo.create', compact('patrocinadorTipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PatrocinadorTipo::$rules);

        $patrocinadorTipo = PatrocinadorTipo::create($request->all());

        return redirect()->route('patrocinador-tipos.index')
            ->with('success', 'PatrocinadorTipo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patrocinadorTipo = PatrocinadorTipo::find($id);

        return view('admin.patrocinador-tipo.show', compact('patrocinadorTipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patrocinadorTipo = PatrocinadorTipo::find($id);

        return view('admin.patrocinador-tipo.edit', compact('patrocinadorTipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PatrocinadorTipo $patrocinadorTipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatrocinadorTipo $patrocinadorTipo)
    {
        request()->validate(PatrocinadorTipo::$rules);

        $patrocinadorTipo->update($request->all());

        return redirect()->route('patrocinador-tipos.index')
            ->with('success', 'PatrocinadorTipo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $patrocinadorTipo = PatrocinadorTipo::find($id)->delete();

        return redirect()->route('patrocinador-tipos.index')
            ->with('success', 'PatrocinadorTipo deleted successfully');
    }
}

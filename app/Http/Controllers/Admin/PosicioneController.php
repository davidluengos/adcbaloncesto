<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posicione;
use Illuminate\Http\Request;

/**
 * Class PosicioneController
 * @package App\Http\Controllers
 */
class PosicioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posiciones = Posicione::paginate();

        return view('admin.posicione.index', compact('posiciones'))
            ->with('i', (request()->input('page', 1) - 1) * $posiciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posicione = new Posicione();
        return view('admin.posicione.create', compact('posicione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Posicione::$rules);

        $posicione = Posicione::create($request->all());

        return redirect()->route('posiciones.index')
            ->with('success', 'Posicione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posicione = Posicione::find($id);

        return view('admin.posicione.show', compact('posicione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posicione = Posicione::find($id);

        return view('admin.posicione.edit', compact('posicione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Posicione $posicione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posicione $posicione)
    {
        request()->validate(Posicione::$rules);

        $posicione->update($request->all());

        return redirect()->route('posiciones.index')
            ->with('success', 'Posicione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $posicione = Posicione::find($id)->delete();

        return redirect()->route('posiciones.index')
            ->with('success', 'Posicione deleted successfully');
    }
}

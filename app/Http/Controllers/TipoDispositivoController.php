<?php

namespace App\Http\Controllers;

use App\Models\TipoDispositivo;
use Illuminate\Http\Request;

/**
 * Class TipoDispositivoController
 * @package App\Http\Controllers
 */
class TipoDispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDispositivos = TipoDispositivo::paginate();

        return view('tipo-dispositivo.index', compact('tipoDispositivos'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoDispositivos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDispositivo = new TipoDispositivo();
        return view('tipo-dispositivo.create', compact('tipoDispositivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoDispositivo::$rules);

        $tipoDispositivo = TipoDispositivo::create($request->all());

        return redirect()->route('dispositivos.index')
            ->with('success', 'TipoDispositivo creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoDispositivo = TipoDispositivo::find($id);

        return view('tipo-dispositivo.show', compact('tipoDispositivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDispositivo = TipoDispositivo::find($id);

        return view('tipo-dispositivo.edit', compact('tipoDispositivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoDispositivo $tipoDispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDispositivo $tipoDispositivo)
    {
        request()->validate(TipoDispositivo::$rules);

        $tipoDispositivo->update($request->all());

        return redirect()->route('tipo-dispositivos.index')
            ->with('success', 'TipoDispositivo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoDispositivo = TipoDispositivo::find($id)->delete();

        return redirect()->route('tipo-dispositivos.index')
            ->with('success', 'TipoDispositivo deleted successfully');
    }
}

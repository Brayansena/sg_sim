<?php

namespace App\Http\Controllers;

use App\Models\DispositivoAsignado;
use Illuminate\Http\Request;

/**
 * Class DispositivoAsignadoController
 * @package App\Http\Controllers
 */
class DispositivoAsignadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispositivoAsignados = DispositivoAsignado::paginate();

        return view('dispositivo-asignado.index', compact('dispositivoAsignados'))
            ->with('i', (request()->input('page', 1) - 1) * $dispositivoAsignados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dispositivoAsignado = new DispositivoAsignado();
        return view('dispositivo-asignado.create', compact('dispositivoAsignado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DispositivoAsignado::$rules);

        $dispositivoAsignado = DispositivoAsignado::create($request->all());

        return redirect()->route('dispositivo-asignados.index')
            ->with('success', 'DispositivoAsignado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispositivoAsignado = DispositivoAsignado::find($id);

        return view('dispositivo-asignado.show', compact('dispositivoAsignado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dispositivoAsignado = DispositivoAsignado::find($id);

        return view('dispositivo-asignado.edit', compact('dispositivoAsignado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DispositivoAsignado $dispositivoAsignado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DispositivoAsignado $dispositivoAsignado)
    {
        request()->validate(DispositivoAsignado::$rules);

        $dispositivoAsignado->update($request->all());

        return redirect()->route('dispositivo-asignados.index')
            ->with('success', 'DispositivoAsignado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dispositivoAsignado = DispositivoAsignado::find($id)->delete();

        return redirect()->route('dispositivo-asignados.index')
            ->with('success', 'DispositivoAsignado deleted successfully');
    }
}

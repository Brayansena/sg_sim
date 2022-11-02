<?php

namespace App\Http\Controllers;

use App\Models\Conexione;
use Illuminate\Http\Request;

/**
 * Class ConexioneController
 * @package App\Http\Controllers
 */
class ConexioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conexiones = Conexione::paginate();

        return view('conexione.index', compact('conexiones'))
            ->with('i', (request()->input('page', 1) - 1) * $conexiones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conexione = new Conexione();
        return view('conexione.create', compact('conexione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Conexione::$rules);

        $conexione = Conexione::create($request->all());

        return redirect()->route('conexiones.index')
            ->with('success', 'Conexione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conexione = Conexione::find($id);

        return view('conexione.show', compact('conexione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conexione = Conexione::find($id);

        return view('conexione.edit', compact('conexione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Conexione $conexione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conexione $conexione)
    {
        request()->validate(Conexione::$rules);

        $conexione->update($request->all());

        return redirect()->route('conexiones.index')
            ->with('success', 'Conexione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $conexione = Conexione::find($id)->delete();

        return redirect()->route('conexiones.index')
            ->with('success', 'Conexione deleted successfully');
    }
}

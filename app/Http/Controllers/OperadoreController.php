<?php

namespace App\Http\Controllers;

use App\Models\Operadore;
use Illuminate\Http\Request;

/**
 * Class OperadoreController
 * @package App\Http\Controllers
 */
class OperadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operadores = Operadore::paginate();

        return view('operadore.index', compact('operadores'))
            ->with('i', (request()->input('page', 1) - 1) * $operadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operadore = new Operadore();
        return view('operadore.create', compact('operadore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Operadore::$rules);

        $operadore = Operadore::create($request->all());

        return redirect()->route('operadores.index')
            ->with('success', 'Operadore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operadore = Operadore::find($id);

        return view('operadore.show', compact('operadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operadore = Operadore::find($id);

        return view('operadore.edit', compact('operadore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Operadore $operadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operadore $operadore)
    {
        request()->validate(Operadore::$rules);

        $operadore->update($request->all());

        return redirect()->route('operadores.index')
            ->with('success', 'Operadore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $operadore = Operadore::find($id)->delete();

        return redirect()->route('operadores.index')
            ->with('success', 'Operadore deleted successfully');
    }
}

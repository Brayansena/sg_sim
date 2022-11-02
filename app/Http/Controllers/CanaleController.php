<?php

namespace App\Http\Controllers;

use App\Models\Canale;
use Illuminate\Http\Request;

/**
 * Class CanaleController
 * @package App\Http\Controllers
 */
class CanaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canales = Canale::paginate();

        return view('canale.index', compact('canales'))
            ->with('i', (request()->input('page', 1) - 1) * $canales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canale = new Canale();
        return view('canale.create', compact('canale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Canale::$rules);

        $canale = Canale::create($request->all());

        return redirect()->route('canales.index')
            ->with('success', 'Canale created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $canale = Canale::find($id);

        return view('canale.show', compact('canale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $canale = Canale::find($id);

        return view('canale.edit', compact('canale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Canale $canale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Canale $canale)
    {
        request()->validate(Canale::$rules);

        $canale->update($request->all());

        return redirect()->route('canales.index')
            ->with('success', 'Canale updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $canale = Canale::find($id)->delete();

        return redirect()->route('canales.index')
            ->with('success', 'Canale deleted successfully');
    }
}

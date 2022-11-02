<?php

namespace App\Http\Controllers;

use App\Models\Regionale;
use Illuminate\Http\Request;

/**
 * Class RegionaleController
 * @package App\Http\Controllers
 */
class RegionaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regionales = Regionale::paginate();

        return view('regionale.index', compact('regionales'))
            ->with('i', (request()->input('page', 1) - 1) * $regionales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regionale = new Regionale();
        return view('regionale.create', compact('regionale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Regionale::$rules);

        $regionale = Regionale::create($request->all());

        return redirect()->route('regionales.index')
            ->with('success', 'Regionale created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regionale = Regionale::find($id);

        return view('regionale.show', compact('regionale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regionale = Regionale::find($id);

        return view('regionale.edit', compact('regionale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Regionale $regionale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regionale $regionale)
    {
        request()->validate(Regionale::$rules);

        $regionale->update($request->all());

        return redirect()->route('regionales.index')
            ->with('success', 'Regionale updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $regionale = Regionale::find($id)->delete();

        return redirect()->route('regionales.index')
            ->with('success', 'Regionale deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Simcard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BodegaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $simcards = DB::table('simcards')
            ->join('users','simcards.id_userAsignado','=','users.id')
            ->select('simcards.id','simcards.linea','simcards.id_userAsignado','users.name')
            ->where('estado','=','Inactiva')
            ->where('simcards.id_userAsignado','=',3)
            ->where('simcards.linea','LIKE','%'.$texto.'%')
            ->orderBy('simcards.linea','desc')
            ->paginate(100000000000000);

        return view('bodega.index', compact('simcards','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $simcards->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $simcard = new Simcard();
        return view('bodega.create', compact('simcard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simcard = new Simcard;
        $id = Auth::id();
        $simcard->id_userCreador=$id;
        $simcard->fecha_regis=now();
        $simcard->linea=$request->input('linea');
        $simcard->usuario=$request->input('usuario');
        $simcard->clave=$request->input('clave');
        $simcard->fecha_corte=$request->input('fecha_corte');
        $simcard->apn=$request->input('apn');
        $simcard->plan_asig=$request->input('plan_asig');
        $simcard->id_userAsignado=$request->input('id_userAsignado');
        $simcard->id_operador=$request->input('id_operador');

        $simcard->save();
        return redirect()->route('simcards.index')
            ->with('success', 'Simcard created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $simcard = Simcard::find($id);

        return view('bodega.show', compact('simcard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $simcard = Simcard::find($id);
        $users=User::pluck('name','id');

        return view('bodega.edit', compact('simcard','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Simcard $simcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $simcard=Simcard::findOrFail($id);
        $simcard->id_userAsignado=$request->input('id_userAsignado');

        if ($simcard->id_userAsignado==2) {

        return redirect()->back()
        ->with('success', 'Usuario asignado no valido');

        }else {
            $idu = Auth::id();
            $simcard->id_userCreador=$idu;
            $simcard->save();

            return redirect()->route('bodegas.index')
            ->with('success', 'Simcard updated successfully');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $simcard = Simcard::find($id)->delete();

        return redirect()->route('bodegas.index')
            ->with('success', 'Simcard deleted successfully');
    }

}

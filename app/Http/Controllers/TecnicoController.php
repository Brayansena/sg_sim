<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Simcard;
use App\Models\Registro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TecnicoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $id = Auth::id();
        $simcards = DB::table('simcards')
            ->select('id','linea','id_userAsignado','id_punto_venta')
            ->where('linea','LIKE','%'.$texto.'%')
            ->orderBy('linea','asc')
            ->paginate(100000000000000);

        return view('tecnico.index', compact('simcards','texto'))
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
        return view('tecnico.create', compact('simcard'));
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

        return view('tecnico.show', compact('simcard'));
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

        return view('tecnico.edit', compact('simcard'));
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
        $idd = Auth::id();
        $simcard->id_userCreador=$idd;
        $simcard->fechaRegistro=now();
        $simcard->id_punto_venta=$request->input('id_punto_venta');

        $simcard->save();

        $registro=new Registro;
        $registro->id_userAsignado=$idd;
        $registro->fechaRegistro=now();
        $registro->id_punto_venta=$request->input('id_punto_venta');

        return redirect()->route('tecnicos.index')
            ->with('success', 'Simcard updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $simcard = Simcard::find($id)->delete();

        return redirect()->route('tecnicos.index')
            ->with('success', 'Simcard deleted successfully');
    }

    public function simcard(Request $request)
    {
        $texto=trim($request->get('texto'));
        $simcards = DB::table('simcards')
            ->join('users','simcards.id_userAsignado','=','users.id')
            ->join('operadores','simcards.id_operador','=','operadores.id')
            ->select('simcards.id','simcards.linea','simcards.apn','simcards.usuario','simcards.clave','simcards.planAsignado','simcards.fechaCorte','simcards.estado','simcards.id_userAsignado','simcards.id_operador','simcards.id_userCreador','simcards.fechaRegistro','users.name','operadores.operador')
            ->where('simcards.id','LIKE','%'.$texto.'%')
            // ->where('users.name','LIKE','%'.$texto.'%')
            ->orderBy('id','asc')
            ->paginate(100000000000000);

        return view('consultas.simcard', compact('simcards','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $simcards->perPage());
    }

    public function punto(Request $request)
    {
        $texto=trim($request->get('texto'));
        $puntoVentas = DB::table('punto_ventas')
            ->join('zonas','punto_ventas.id_zona','=','zonas.id')
            ->join('municipios','punto_ventas.id_municipio','=','municipios.id')
            ->join('canales','punto_ventas.id_canal','=','canales.id')
            ->join('regionales','punto_ventas.id_regional','=','regionales.id')
            ->join('conexiones','punto_ventas.id_conexion','=','conexiones.id')
            ->join('cordinadores','punto_ventas.id_cordinador','=','cordinadores.id')
            ->join('jefe_comerciales','punto_ventas.id_jefeComercial','=','jefe_comerciales.id')
            ->join('lideres','punto_ventas.id_lider','=','lideres.id')
            ->join('users','punto_ventas.id_userCreador','=','users.id')
            ->select('users.name','punto_ventas.cod_puntoVenta','punto_ventas.id','punto_ventas.nombrePdv','punto_ventas.direccion','zonas.zona','municipios.municipio','canales.canal','regionales.regional','conexiones.conexion','cordinadores.cordinador','jefe_comerciales.jefeComercial','lideres.lider')
            ->where('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orderBy('punto_ventas.id','asc')
            ->paginate(100000000000000);

        return view('consultas.punto', compact('puntoVentas','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $puntoVentas->perPage());
    }

    public function rede(Request $request)
    {
        $texto=trim($request->get('texto'));
        $redes = DB::table('redes')
            ->join('punto_ventas','redes.id_punto_venta','=','punto_ventas.id')
            ->select('redes.id','redes.nombreNodo','redes.ip_radio','redes.ip_equipo','redes.ip_redlan','redes.id_punto_venta','punto_ventas.nombrePdv')
            ->where('redes.id_punto_venta','LIKE','%'.$texto.'%')
            ->orderBy('redes.id','desc')
            ->paginate(100000000000000);

        return view('consultas.red', compact('redes','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $redes->perPage());
    }

}

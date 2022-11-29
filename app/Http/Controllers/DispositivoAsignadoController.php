<?php

namespace App\Http\Controllers;
use App\Models\IntercambiosDispositivo;
use App\Models\DispositivoAsignado;
use Illuminate\Http\Request;
use App\Models\IntercambiosSim;
use App\Models\Estado;
use App\Models\TipoDispositivo;
use App\Models\Simcard;
use App\Models\SimcardsAsignada;
use App\Models\Dispositivo;
use App\Models\SimcardsAsignadasRegistrada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function estado(Request $request)
    {
        $users = DB::table('users')
            ->select('name')
            ->orderBy('id','asc')
            ->paginate(100000000000);
        $texto=trim($request->get('texto'));
        $dispositivos = DB::table('dispositivos')
            ->join('users','dispositivos.id_userAsignado','=','users.id')
            ->join('punto_ventas','dispositivos.id_puntoVenta','=','punto_ventas.id')
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.modelo','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.observacion','users.name','dispositivos.numeroActa','dispositivos.updated_at','dispositivos.procesador','dispositivos.ram','dispositivos.discoDuro','dispositivos.cantidad','dispositivos.id_userCreador')
            ->where('dispositivos.estado','!=','Asignado')
            ->where('dispositivos.id','LIKE','%'.$texto.'%')
            ->orderBy('dispositivos.id','asc')
            ->paginate(100000000000);
        return view('dispositivo-asignado.estado', compact('users','dispositivos','texto'));

    }
    public function activoEntrada(Request $request)
    {
        $idu = Auth::id();
        $dispositivo = new Dispositivo();
        $selesion = DB::table('dispositivos')
        ->select('id','estado','id_userAsignado')
        ->where('id_userAsignado', $idu)
        ->where('estado','Disponible')
        ->orderBy('id','asc')
        ->paginate(100000000);
        $dispositivoss = $selesion->pluck('id','id');
        $estado=Estado::pluck('estado','estado');
        $tipoDispositivo=TipoDispositivo::pluck('dispositivo','dispositivo');
        return view('dispositivo-asignado.activoEntrada', compact('estado','dispositivoss','dispositivo','tipoDispositivo','estado'));
    }
    public function activoSalida(Request $request)
    {
        $idu = Auth::id();
        $dispositivo = new Dispositivo();
        $selesion = DB::table('dispositivos')
        ->select('id','estado','id_userAsignado')
        ->where('id_userAsignado', $idu)
        ->where('estado','Disponible')
        ->orderBy('id','asc')
        ->paginate(100000000);
        $dispositivoss = $selesion->pluck('id','id');
        $estado=Estado::pluck('estado','estado');
        $tipoDispositivo=TipoDispositivo::pluck('dispositivo','dispositivo');
        return view('dispositivo-asignado.activoSalida', compact('estado','dispositivoss','dispositivo','tipoDispositivo','estado'));
    }
    public function activoEntradaAsignado(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:dispositivos,id',
            'numeroActa' => 'required|unique:dispositivos,numeroActa',
        ],
        [
            'id.exists' => 'Activo no existe',
            'numeroActa.unique' => 'Numero de acta en uso'
        ]);
        $dispositivoAsignado = new DispositivoAsignado;;
        $idu = Auth::id();
        $dispositivoAsignado->id_userCreador=$idu;
        $dispositivoAsignado->id_userAsignado=$idu;
        $dispositivoAsignado->id_dispositivo=$request->input('id');
        $dispositivoAsignado->id_puntoVenta=1;
        $dispositivoAsignado->registro='Devuelto';
        $dispositivoAsignado->numeroActa=$request->input('numeroActa');
        $dispositivoAsignado->save();
        $idd=$request->input('id');
        $dispositivo=Dispositivo::findOrFail($idd);
        $dispositivo->id_userAsignado=3;
        $dispositivo->id_puntoVenta=1;
        $dispositivo->estado='Disponible';
        $dispositivo->numeroActa=$request->input('numeroActa');
        $dispositivo->id_userCreador=$idu;
        $dispositivo->save();
        return redirect()->route('dispositivos.entrada')
        ->with('success', 'Dispositivo Asignado Satisfactoriamente');
    }

    public function activoSalidaAsignado(Request $request)
    {
        request()->validate(DispositivoAsignado::$rules);
        $request->validate([
            'id_puntoVenta' => 'required|exists:punto_ventas,id',
        ],
        [
            'id_puntoVenta.exists' => 'Codigo del punto de venta no existe'
        ]);
        $dispositivoAsignado = new DispositivoAsignado;;
        $idu = Auth::id();
        $dispositivoAsignado->id_userCreador=$idu;
        $dispositivoAsignado->id_userAsignado=$idu;
        $dispositivoAsignado->id_dispositivo=$request->input('id');
        $dispositivoAsignado->id_puntoVenta=$request->input('id_puntoVenta');
        $dispositivoAsignado->registro='Asignado';
        $dispositivoAsignado->numeroActa=$request->input('numeroActa');
        $dispositivoAsignado->save();
        $idd=$request->input('id');
        $dispositivo=Dispositivo::findOrFail($idd);
        $dispositivo->id_userAsignado=$idu;
        $dispositivo->id_puntoVenta=$request->input('id_puntoVenta');
        $dispositivo->estado='Asignado';
        $dispositivo->numeroActa=$request->input('numeroActa');
        $dispositivo->id_userCreador=$idu;
        $dispositivo->save();
        return redirect()->route('dispositivos.salida')
        ->with('success', 'Dispositivo Asignado Satisfactoriamente');
    }
    public function edituser($id)
    {
        $selesion = DB::table('users')
        ->select('id','name')
        ->where('id','>=', 3)
        ->orderBy('id','asc')
        ->paginate(1000000);
        $users = $selesion->pluck('name','id');
        $dispositivo = Dispositivo::find($id);
        $estado=Estado::pluck('estado','estado');
        $tipoDispositivo=TipoDispositivo::pluck('dispositivo','dispositivo');
        $estado=Estado::pluck('estado','estado');
        return view('dispositivo-asignado.edituser', compact('estado','users','dispositivo','tipoDispositivo','estado'));
    }
    public function updateuser(Request $request, $id)
    {
        request()->validate(DispositivoAsignado::$rules2);


        $dispositivo=Dispositivo::findOrFail($id);
        $dispositivo->id_puntoVenta=1;
        $dispositivo->id_userAsignado=$request->input('id_userAsignado');
        $dispositivo->estado=$request->input('estado');
        $dispositivo->save();

        $dispositivoAsignado = new DispositivoAsignado;;
        $idu = Auth::id();
        $dispositivoAsignado->id_puntoVenta=$idu;
        $dispositivoAsignado->id_userCreador=$idu;
        $dispositivoAsignado->id_userAsignado=$request->input('id_userAsignado');
        $dispositivoAsignado->id_dispositivo=$id;
        $dispositivoAsignado->id_puntoVenta=1;
        $dispositivoAsignado->registro=$request->input('estado');
        $dispositivoAsignado->numeroActa=$dispositivo->numeroActa;
        $dispositivoAsignado->save();

        return redirect()->route('dispositivos.estado')
            ->with('success', 'Dispositivo actualizado satisfactoriamente');
        }

    public function intercambioindex(Request $request){
        $texto=trim($request->get('texto'));
        $users = DB::table('users')
            ->select('name')
            ->orderBy('id','asc')
            ->paginate(100000000000);
        $dispositivos = DB::table('dispositivos')
            ->join('users','dispositivos.id_userAsignado','=','users.id')
            ->join('punto_ventas','dispositivos.id_puntoVenta','=','punto_ventas.id')
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.modelo','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.observacion','users.name','dispositivos.numeroActa','dispositivos.updated_at','dispositivos.procesador','dispositivos.ram','dispositivos.discoDuro','dispositivos.cantidad','dispositivos.id_userCreador')
            ->where('dispositivos.estado','Asignado')
            ->orWhere('dispositivos.estado','Asignado')
            ->orWhere('dispositivos.id_userAsignado','Asignado')
            ->where('punto_ventas.id','LIKE','%'.$texto.'%')
            ->orderBy('dispositivos.id','desc')
            ->paginate(100000000000);
        return view('dispositivo-asignado.intercambioindex', compact('users','dispositivos','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $dispositivos->perPage());
    }
    public function intercambioedit(Request $request,$id)
    {
        $idu = Auth::id();
        $dispositivo = Dispositivo::find($id);
        $selesion = DB::table('dispositivos')
        ->select('id','id_userAsignado')
        ->where('id_puntoVenta',1)
        ->where('estado','Disponible')
        ->where('id_userAsignado',$idu)
        ->orderBy('id','asc')
        ->paginate(100000000000000);
        $disponibles = $selesion->pluck('id','id');
        return view('dispositivo-asignado.intercambioedit', compact('disponibles','dispositivo'));
    }

    public function intercambioupdate(Request $request,$id)
    {
        $idu = Auth::id();
        // request()->validate(IntercambiosSim::$rules);
        $request->validate([
            'numeroActa' => 'required|unique:dispositivo_asignados,numeroActa',
            'id_newActivo' => 'required|exists:dispositivos,id',
        ],
        [
            'numeroActa.unique' => 'Numero de acta en uso',
            'id_newActivo.exists' => 'Activo no existe'
        ]);
        $dispositivo = Dispositivo::find($id);
        $intercambio = new IntercambiosDispositivo();
        $intercambio->id_oldDispositivo=$id;
        $intercambio->id_puntoVenta=$dispositivo->id_puntoVenta;
        $intercambio->id_userCreador=$idu;
        $intercambio->id_newDispositivo=$request->input('id_newActivo');
        $intercambio->save();
        $dispositivosAsignados = new DispositivoAsignado;
        $dispositivosAsignados->id_userCreador=$idu;
        $dispositivosAsignados->id_puntoVenta=$dispositivo->id_puntoVenta;
        $dispositivosAsignados->id_dispositivo=$request->input('id_newActivo');
        $dispositivosAsignados->numeroActa=$request->input('numeroActa');
        $dispositivosAsignados->id_userAsignado=$dispositivo->id_userAsignado;
        $dispositivosAsignados->registro='Asignado';
        $dispositivosAsignados->save();

        $dispositivosAsignados = new DispositivoAsignado;
        $dispositivosAsignados->id_userCreador=$idu;
        $dispositivosAsignados->id_puntoVenta=$dispositivo->id_puntoVenta;
        $dispositivosAsignados->id_dispositivo=$id;
        $dispositivosAsignados->numeroActa=$dispositivo->numeroActa;
        $dispositivosAsignados->id_userAsignado=$dispositivo->id_userAsignado;
        $dispositivosAsignados->registro='Disponible';
        $dispositivosAsignados->save();

        Dispositivo::where('id',$intercambio->id_oldDispositivo)->update(['estado'=>'Disponible','id_userAsignado'=>$idu,'id_puntoVenta'=>1]);
        Dispositivo::where('id',$intercambio->id_newDispositivo)->update(['estado'=>'Asignado','id_userAsignado'=>$idu,'id_puntoVenta'=>$dispositivo->id_puntoVenta]);

        return redirect()->route('dispositivos.intercambioindex')
            ->with('success', 'Dispositivo actualizada satisfactoriamente');

    }

}

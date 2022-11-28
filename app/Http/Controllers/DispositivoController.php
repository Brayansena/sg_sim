<?php

namespace App\Http\Controllers;

use App\Models\TipoDispositivo;
use App\Models\Dispositivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Operadore;
use App\Models\Simcard;
use App\Models\Estado;
use App\Exports\DispositivoExport;
use App\Imports\DispositivoImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\DispositivoAsignado;

/**
 * Class DispositivoController
 * @package App\Http\Controllers
 */
class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $users = DB::table('users')
            ->select('name')
            ->orderBy('id','asc')
            ->paginate(100000000000);
        $dispositivos = DB::table('dispositivos')
            ->join('users','dispositivos.id_userAsignado','=','users.id')
            ->join('punto_ventas','dispositivos.id_puntoVenta','=','punto_ventas.id')
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.modelo','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.observacion','users.name','dispositivos.numeroActa','dispositivos.updated_at','dispositivos.procesador','dispositivos.ram','dispositivos.discoDuro','dispositivos.cantidad','dispositivos.id_userCreador')
            ->where('dispositivos.id','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.id_puntoVenta','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.tipoDispositivo','LIKE','%'.$texto.'%')
            ->orWhere('users.name','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.numeroActa','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.modelo','LIKE','%'.$texto.'%')
            ->orderBy('dispositivos.id','desc')
            ->paginate(100000000000);
            $dispositivoc = DB::table('dispositivos')
            ->join('users','dispositivos.id_userAsignado','=','users.id')
            ->join('punto_ventas','dispositivos.id_puntoVenta','=','punto_ventas.id')
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.modelo','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.observacion','users.name','dispositivos.numeroActa','dispositivos.updated_at','dispositivos.procesador','dispositivos.ram','dispositivos.discoDuro','dispositivos.cantidad','dispositivos.id_userCreador')
            ->where('dispositivos.id','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.id_puntoVenta','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.tipoDispositivo','LIKE','%'.$texto.'%')
            ->orWhere('users.name','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.numeroActa','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.modelo','LIKE','%'.$texto.'%')
            ->get();



        return view('dispositivo.index', compact('users','dispositivoc','dispositivos','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $dispositivos->perPage());
    }

    public function create()
    {
        $collectionPda = collect([
            ['id' => 'N910', 'na' => 'N910'],
            ['id' => 'Vs1', 'na' => 'Vs1'],
            ['id' => 'Cs10', 'na' => 'Cs10'],
        ]);
        $pda = $collectionPda->pluck('id','na');
        $pda->all();

        $collectionImpresora = collect([
            ['id' => 'Epson', 'na' => 'Epson'],
            ['id' => 'Sat', 'na' => 'Sat'],
        ]);
        $impresora = $collectionImpresora->pluck('id','na');
        $impresora->all();


        $collectionRouter = collect([
            ['id' => 'ZTE', 'na' => 'ZTE'],
            ['id' => 'MIKROTIK', 'na' => 'MIKROTIK'],
        ]);
        $router = $collectionRouter->pluck('id','na');
        $router->all();

        $collectionEstado = collect([
            ['id' => 'Asignado', 'na' => 'Asignado'],
            ['id' => 'Disponible', 'na' => 'Disponible'],
            ['id' => 'Reparacion', 'na' => 'Reparacion'],
            ['id' => 'Garantia', 'na' => 'Garantia'],
            ['id' => 'De Baja', 'na' => 'De Baja'],
            ['id' => 'Revision', 'na' => 'Revision'],
        ]);
        $estado = $collectionEstado->pluck('id','na');
        $estado->all();




        $tipo=0;
        $dispositivo = new Dispositivo();
        $selesion = DB::table('users')
        ->select('id','name')
        ->where('id','>=', 3)
        ->orderBy('id','asc')
        ->paginate(1000000);
        $users = $selesion->pluck('name','id');
        $tipoPluck=TipoDispositivo::pluck('dispositivo','dispositivo');
        $tipoDispositivos=DB::table('tipo_dispositivos')
        ->select('id','dispositivo')
        ->orderBy('id','asc')
        ->paginate(100000000000);
        return view('dispositivo.create', compact('router','impresora','pda','users','tipo','tipoDispositivos','dispositivo','estado','tipoPluck'));
    }

    public function store(Request $request)
    {
        request()->validate(Dispositivo::$rules);

        $dispositivo = Dispositivo::create($request->all());
        $idu = Auth::id();
        $dispositivo->id_userCreador=$idu;
        $dispositivo->save();


        $estado=$request->input('estado');
        $dispositivoAsignado = new DispositivoAsignado;;
        $idu = Auth::id();
        $dispositivoAsignado->id_userCreador=$idu;
        $dispositivoAsignado->id_userAsignado=$request->input('id_userAsignado');
        $dispositivoAsignado->id_dispositivo=$request->input('id');
        $dispositivoAsignado->id_puntoVenta=$request->input('id_puntoVenta');
        $dispositivoAsignado->registro=$request->input('estado');
        $dispositivoAsignado->numeroActa=$request->input('numeroActa');
        $dispositivoAsignado->save();


        return redirect()->route('dispositivos.index')
        ->with('success', 'Dispositivo creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispositivo = Dispositivo::find($id);

        return view('dispositivo.show', compact('dispositivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selesion = DB::table('users')
        ->select('id','name')
        ->where('id','>=', 3)
        ->orderBy('id','asc')
        ->paginate(1000000);
        $users = $selesion->pluck('name','id');
        $dispositivo = Dispositivo::find($id);
        $tipoDispositivo=TipoDispositivo::pluck('dispositivo','dispositivo');
        $estado=Estado::pluck('estado','estado');
        return view('dispositivo.edit', compact('users','dispositivo','tipoDispositivo','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dispositivo $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dispositivo=Dispositivo::findOrFail($id);

        $dispositivo->update($request->all());
        $idu = Auth::id();
        $dispositivo->id_userCreador=$idu;
        $dispositivo->save();



        return redirect()->route('dispositivos.index')
            ->with('success', 'Dispositivo actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dispositivo = Dispositivo::find($id)->delete();

        return redirect()->route('dispositivos.index')
            ->with('success', 'Dispositivo eliminado satisfactoriamente');
    }
    public function exportar()
    {
        return Excel::download(new DispositivoExport, 'Dispositivo.xlsx');
        return back()->with('success', 'Exportado satisfactoriamente');
    }
    public function importar(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new DispositivoImport,$file);
        return back()->with('success', 'Importado satisfactoriamente');
    }
    public function consulta(Request $request)
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
            ->where('dispositivos.id','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.id_puntoVenta','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.tipoDispositivo','LIKE','%'.$texto.'%')
            ->orWhere('users.name','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.numeroActa','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.modelo','LIKE','%'.$texto.'%')
            ->orderBy('dispositivos.id','desc')
            ->paginate(100000000000);
            $dispositivoc = DB::table('dispositivos')
            ->join('users','dispositivos.id_userAsignado','=','users.id')
            ->join('punto_ventas','dispositivos.id_puntoVenta','=','punto_ventas.id')
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.modelo','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.observacion','users.name','dispositivos.numeroActa','dispositivos.updated_at','dispositivos.procesador','dispositivos.ram','dispositivos.discoDuro','dispositivos.cantidad','dispositivos.id_userCreador')
            ->where('dispositivos.id','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.id_puntoVenta','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.tipoDispositivo','LIKE','%'.$texto.'%')
            ->orWhere('users.name','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.numeroActa','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.modelo','LIKE','%'.$texto.'%')
            ->get();

        return view('dispositivo.consulta', compact('users','dispositivoc','dispositivos','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $dispositivos->perPage());
    }
}

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
        $dispositivos = DB::table('dispositivos')
            ->join('users','dispositivos.id_userCreador','=','users.id')
            ->join('punto_ventas','dispositivos.id_puntoVenta','=','punto_ventas.id')
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.marca','dispositivos.descripcion','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.capacidad','dispositivos.observacion','users.name','dispositivos.cedulaResponsable','dispositivos.responsable','dispositivos.fechaAsignacion','dispositivos.numeroActa','dispositivos.updated_at')
            ->where('dispositivos.id','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.id_puntoVenta','LIKE','%'.$texto.'%')
            ->orderBy('dispositivos.id','desc')
            ->paginate(100000000000);

        return view('dispositivo.index', compact('dispositivos','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $dispositivos->perPage());
    }


    public function eleccion(Request $request)
    {
        $dispositivo = new Dispositivo();
        $tipoDispositivo=TipoDispositivo::pluck('dispositivo','id');

        return view('dispositivo.eleccion', compact('tipoDispositivo','dispositivo'));
    }
    public function eleccionado(Request $request)
    {
        $dispositivo = new Dispositivo();
        $tipo=$request->input('tipo');
        $tipo->save();
        $estado=Estado::pluck('estado','estado');
        $tipoDispositivo=TipoDispositivo::pluck('dispositivo','dispositivo');
        return view('dispositivo.eleccionado', compact('tipo','tipoDispositivo','estado'));
    }



    public function create()
    {
        $dispositivo = new Dispositivo();
        $estado=Estado::pluck('estado','estado');
        $tipoDispositivo=TipoDispositivo::pluck('dispositivo','dispositivo');
        return view('dispositivo.create', compact('tipo','dispositivo','estado'));
    }

    public function store(Request $request)
    {
        request()->validate(Dispositivo::$rules);

        $dispositivo = Dispositivo::create($request->all());
        $idu = Auth::id();
        $dispositivo->id_userCreador=$idu;
        $dispositivo->save();

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
        $dispositivo = Dispositivo::find($id);
        $tipoDispositivo=TipoDispositivo::pluck('dispositivo','dispositivo');
        $estado=Estado::pluck('estado','estado');
        return view('dispositivo.edit', compact('dispositivo','tipoDispositivo','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dispositivo $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispositivo $dispositivo)
    {
        request()->validate(Dispositivo::$rules);

        $dispositivo->update($request->all());

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
        $texto=trim($request->get('texto'));
        $dispositivos = DB::table('dispositivos')
            ->join('users','dispositivos.id_userCreador','=','users.id')
            ->join('punto_ventas','dispositivos.id_puntoVenta','=','punto_ventas.id')
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.marca','dispositivos.descripcion','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.capacidad','dispositivos.observacion','users.name','dispositivos.cedulaResponsable','dispositivos.responsable','dispositivos.fechaAsignacion','dispositivos.numeroActa','dispositivos.updated_at')
            ->where('dispositivos.id','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.id_puntoVenta','LIKE','%'.$texto.'%')
            ->orderBy('dispositivos.id','desc')
            ->paginate(100000000000);

        return view('dispositivo.consulta', compact('dispositivos','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $dispositivos->perPage());
    }
}

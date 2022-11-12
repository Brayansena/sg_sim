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
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.modelo','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.observacion','users.name','dispositivos.numeroActa','dispositivos.updated_at','dispositivos.procesador','dispositivos.ram','dispositivos.discoDuro','dispositivos.cantidad')
            ->where('dispositivos.id','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.id_puntoVenta','LIKE','%'.$texto.'%')
            ->orWhere('users.name','LIKE','%'.$texto.'%')
            ->orderBy('dispositivos.id','desc')
            ->paginate(100000000000);

        return view('dispositivo.index', compact('dispositivos','texto'))
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




        $tipo=0;
        $dispositivo = new Dispositivo();
        $selesion = DB::table('users')
        ->select('id','name')
        ->where('id','>=', 2)
        ->orderBy('id','asc')
        ->paginate(1000000);
        $users = $selesion->pluck('name','id');
        $estado=Estado::pluck('estado','estado');
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
        if ($dispositivo->id_puntoVenta==1) {
            return redirect()->route('dispositivos.index')
            ->with('success', 'Dispositivo creado satisfactoriamente.');
        } else {
            # code...
        }



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
    public function update(Request $request, $id)
    {
        $dispositivo=Dispositivo::findOrFail($id);

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
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.modelo','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.observacion','users.name','dispositivos.numeroActa','dispositivos.updated_at')
            ->where('dispositivos.id','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.id_puntoVenta','LIKE','%'.$texto.'%')
            ->orWhere('users.name','LIKE','%'.$texto.'%')
            ->orderBy('dispositivos.id','desc')
            ->paginate(100000000000);

        return view('dispositivo.consulta', compact('dispositivos','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $dispositivos->perPage());
    }
}

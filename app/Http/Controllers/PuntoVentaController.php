<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Exports\PuntoVentaExport;
use App\Imports\PuntoVentaImport;
use App\Models\PuntoVenta;
use App\Models\Zona;
use App\Models\Municipio;
use App\Models\Canale;
use App\Models\Regionale;
use App\Models\Conexione;
use App\Models\Cordinadore;
use App\Models\JefeComerciale;
use App\Models\Lidere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
/**
 * Class PuntoVentaController
 * @package App\Http\Controllers
 */
class PuntoVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $puntoVentas = DB::table('punto_ventas')
            ->join('users','punto_ventas.id_userCreador','=','users.id')
            ->select('users.name','punto_ventas.id','punto_ventas.nombrePdv','punto_ventas.direccion','punto_ventas.zona','punto_ventas.municipio','punto_ventas.canal','punto_ventas.conexion','punto_ventas.cordinador','punto_ventas.jefeComercial','punto_ventas.lider','punto_ventas.ccLider','punto_ventas.ccCordinador','punto_ventas.estado')
            ->where('punto_ventas.id','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.conexion','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.zona','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.municipio','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.jefeComercial','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.cordinador','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.lider','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.estado','LIKE','%'.$texto.'%')
            ->orderBy('punto_ventas.id','asc')
            ->paginate(1000000000000000000000);

        return view('punto-venta.index', compact('puntoVentas','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $puntoVenta = new PuntoVenta();
        $zonas=Zona::pluck('zona','zona');
        $municipios=Municipio::pluck('municipio','municipio');
        $regionales=Regionale::pluck('regional','regional');
        $conexiones=Conexione::pluck('conexion','conexion');
        $municipios=Municipio::pluck('municipio','municipio');
        $canales=Canale::pluck('canal','canal');
        return view('punto-venta.create', compact('puntoVenta','zonas','municipios','regionales','conexiones','canales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PuntoVenta::$rules);

        $puntoVenta = PuntoVenta::create($request->all());
        $idu = Auth::id();
        $puntoVenta->id_userCreador=$idu;
        $puntoVenta->save();

        return redirect()->route('punto-ventas.index')
            ->with('success', 'Punto Venta creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collectionEstado = collect([
            ['id' => 'Activo', 'na' => 'Activo'],
            ['id' => 'Inactivo', 'na' => 'Inactivo'],
        ]);
        $estados = $collectionEstado->pluck('id','na');
        $estados->all();
        $puntoVenta = PuntoVenta::find($id);
        $zonas=Zona::pluck('zona','zona');
        $municipios=Municipio::pluck('municipio','municipio');
        $regionales=Regionale::pluck('regional','regional');
        $conexiones=Conexione::pluck('conexion','conexion');
        $canales=Canale::pluck('canal','canal');

        return view('punto-venta.edit', compact('estados','puntoVenta','zonas','municipios','regionales','conexiones','canales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PuntoVenta $puntoVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $puntoVenta=PuntoVenta::findOrFail($id);
        $puntoVenta->update($request->all());
        $idu = Auth::id();
        $puntoVenta->id_userCreador=$idu;
        $puntoVenta->save();

        return redirect()->route('punto-ventas.index')
            ->with('success', 'Punto venta actualizada satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $puntoVenta = PuntoVenta::find($id)->delete();

        return redirect()->route('punto-ventas.index')
            ->with('success', 'Punto venta eliminado satisfactoriamente');
    }
    public function exportar()
    {
        return Excel::download(new PuntoVentaExport, 'puntoVenta.csv');
        return back()->with('success', 'Exportado satisfactoriamente');
    }
    public function importar(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PuntoVentaImport,$file);
        return back()->with('success', 'Importado satisfactoriamente');
    }

    public function consulta(Request $request)
    {
        $texto=trim($request->get('texto'));
        $puntoVentas = DB::table('punto_ventas')
            ->join('users','punto_ventas.id_userCreador','=','users.id')
            ->select('users.name','punto_ventas.id','punto_ventas.nombrePdv','punto_ventas.direccion','punto_ventas.zona','punto_ventas.municipio','punto_ventas.canal','punto_ventas.conexion','punto_ventas.cordinador','punto_ventas.jefeComercial','punto_ventas.lider','punto_ventas.ccLider','punto_ventas.ccCordinador','punto_ventas.estado')
            ->where('punto_ventas.id','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.conexion','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.zona','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.municipio','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.jefeComercial','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.cordinador','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.lider','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.estado','LIKE','%'.$texto.'%')
            ->orderBy('punto_ventas.id','asc')
            ->paginate(1000000000000000000000);

        return view('punto-venta.consulta', compact('puntoVentas','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $puntoVentas->perPage());
    }
}

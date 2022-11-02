<?php

namespace App\Http\Controllers;

use App\Models\Rede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\RedeExport;
use App\Imports\RedeImport;
use App\Models\PuntoVenta;
use App\Models\Zona;
use App\Models\Municipio;
use App\Models\Canale;
use App\Models\Regionale;
use App\Models\Conexione;
use App\Models\Cordinadore;
use App\Models\JefeComerciale;
use App\Models\Lidere;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class RedeController
 * @package App\Http\Controllers
 */
class RedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $redes = DB::table('redes')
            ->join('punto_ventas','redes.id_puntoVenta','=','punto_ventas.id')
            ->select('redes.id','redes.nombreNodo','redes.ip_radio','redes.ip_redlan','redes.ip_equipo','redes.created_at','redes.id_puntoVenta','punto_ventas.nombrePdv','redes.id_puntoVenta')
            ->where('punto_ventas.id','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orderBy('punto_ventas.nombrePdv','desc')
            ->paginate();

        return view('rede.index', compact('redes','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rede = new Rede();
        $puntoVentas=PuntoVenta::pluck('nombrePdv','id');
        return view('rede.create', compact('rede','puntoVentas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Rede::$rules);

        $rede = Rede::create($request->all());

        return redirect()->route('redes.index')
            ->with('success', 'Rede creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rede = Rede::find($id);

        return view('rede.show', compact('rede'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rede = Rede::find($id);
        $puntoVentas=PuntoVenta::pluck('nombrePdv','id');

        return view('rede.edit', compact('rede','puntoVentas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rede $rede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rede $rede)
    {
        request()->validate(Rede::$rules);

        $rede->update($request->all());

        return redirect()->route('redes.index')
            ->with('success', 'Red actualizada satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rede = Rede::find($id)->delete();

        return redirect()->route('redes.index')
            ->with('success', 'Red eliminada satisfactoriamente');
    }
    public function exportar()
    {
        return Excel::download(new RedeExport, 'redes.xlsx');
        return back()->with('success', 'Exportado satisfactoriamente');
    }
    public function importar(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new RedeImport,$file);
        return back()->with('success', 'Importado satisfactoriamente');
    }

    public function consulta(Request $request)
    {
        $texto=trim($request->get('texto'));
        $redes = DB::table('redes')
            ->join('punto_ventas','redes.id_puntoVenta','=','punto_ventas.id')
            ->select('redes.id','redes.nombreNodo','redes.ip_radio','redes.ip_redlan','redes.ip_equipo','redes.created_at','punto_ventas.id','punto_ventas.nombrePdv','redes.id_puntoVenta')
            ->where('punto_ventas.id','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orderBy('punto_ventas.nombrePdv','desc')
            ->paginate();

        return view('rede.consulta', compact('redes','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $redes->perPage());
    }
}

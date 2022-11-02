<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\Simcard;
use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;
use App\Exports\ConsumoExport;
use App\Imports\ConsumoImport;
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
 * Class ConsumoController
 * @package App\Http\Controllers
 */
class ConsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $consumos = DB::table('consumos')
            ->join('users','consumos.id_userCreador','=','users.id')
            ->join('simcards','consumos.id_simcards','=','simcards.id')
            ->select('consumos.id','consumos.consumo1','consumos.consumo2','consumos.consumo3','users.name','simcards.linea','consumos.id_simcards','consumos.id_userCreador')
            ->where('consumos.id_simcards','LIKE','%'.$texto.'%')
            ->orderBy('consumos.id','asc')
            ->paginate(100000000000000);

        return view('consumo.index', compact('consumos','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $consumos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consumo = new Consumo();
        $simcards=Simcard::pluck('linea','id');
        return view('consumo.create', compact('consumo','simcards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Consumo::$rules);
        $consumo = Consumo::create($request->all());
        $idu = Auth::id();
        $consumo->id_userCreador=$idu;
        $consumo->save();


        return redirect()->route('consumos.index')
            ->with('success', 'Consumo creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consumo = Consumo::find($id);

        return view('consumo.show', compact('consumo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consumo = Consumo::find($id);
        $simcards=Simcard::pluck('linea','id');
        return view('consumo.edit', compact('consumo','simcards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consumo $consumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $consumo=Consumo::findOrFail($id);
        $consumo->update($request->all());
        $idu = Auth::id();
        $consumo->id_userCreador=$idu;
        $consumo->save();

        return redirect()->route('consumos.index')
            ->with('success', 'Consumo actualizada satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consumo = Consumo::find($id)->delete();

        return redirect()->route('consumos.index')
            ->with('success', 'eliminada satisfactoriamente');
    }
    public function exportar()
    {
        return Excel::download(new ConsumoExport, 'consumo.xlsx');
        return back()->with('success', 'Exportado satisfactoriamente');
    }
    public function importar(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ConsumoImport,$file);
        return back()->with('success', 'Importado satisfactoriamente');
    }

    public function consulta(Request $request)
    {
        $texto=trim($request->get('texto'));
        $consumos = DB::table('consumos')
            ->join('users','consumos.id_userCreador','=','users.id')
            ->join('simcards','consumos.id_simcards','=','simcards.id')
            ->select('consumos.id','consumos.consumo1','consumos.consumo2','consumos.consumo3','users.name','simcards.linea','consumos.id_simcards','consumos.id_userCreador')
            ->where('consumos.id_simcards','LIKE','%'.$texto.'%')
            ->orderBy('consumos.id','asc')
            ->paginate(100000000000000);

        return view('consumo.consulta', compact('consumos','texto'))
            ->with('i', (request()->input('page', 1) - 1) * $consumos->perPage());
    }
}

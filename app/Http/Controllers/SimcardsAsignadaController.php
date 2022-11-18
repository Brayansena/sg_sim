<?php

namespace App\Http\Controllers;
use App\Exports\SimcardsAsignadaExport;
use App\Models\SimcardsAsignadasRegistrada;
use App\Models\SimcardsAsignada;
use App\Models\PuntoVenta;
use App\Models\Simcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Operadore;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class SimcardsAsignadaController
 * @package App\Http\Controllers
 */
class SimcardsAsignadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::id();
        $texto=trim($request->get('texto'));
        $simcardsAsignadas = DB::table('simcards_asignadas_registradas')
            ->join('users','simcards_asignadas_registradas.id_userCreador','=','users.id')
            ->join('simcards','simcards_asignadas_registradas.id_simcard','=','simcards.id')
            ->join('punto_ventas','simcards_asignadas_registradas.id_puntoVenta','=','punto_ventas.id')
            ->select('simcards_asignadas_registradas.id','simcards_asignadas_registradas.observaciones','simcards.linea','punto_ventas.nombrePdv','punto_ventas.conexion','users.name','simcards_asignadas_registradas.estado','simcards_asignadas_registradas.fechaRegistro','simcards_asignadas_registradas.id_puntoVenta','simcards.id')
            // ->where('simcards_asignadas_registradas.id_userCreador','=',$id)
            ->where('simcards.id','LIKE','%'.$texto.'%')
            ->orWhere('simcards_asignadas_registradas.id_puntoVenta','LIKE','%'.$texto.'%')
            ->orWhere('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orderBy('simcards_asignadas_registradas.estado','asc')
            ->paginate(100000000000000);

            $contadors = DB::table('simcards_asignadas_registradas')
            ->select('simcards_asignadas_registradas.estado')
            ->where('simcards_asignadas_registradas.estado','Activa')
            ->get();

        return view('simcards-asignada.index', compact('simcardsAsignadas','texto','contadors'))
            ->with('i', (request()->input('page', 1) - 1) * $simcardsAsignadas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $simcardsAsignada = new SimcardsAsignada();
        $id = Auth::id();
        $selesion = DB::table('simcards')
        ->select('id','linea')
        ->where('simcards.estado','Inactiva')
        ->where('simcards.id_userAsignado',$id)
        ->orderBy('id','asc')
        ->paginate(100000000000000);
        $simcards = $selesion->pluck('id','id');
        $puntoventa=PuntoVenta::pluck('nombrePdv','id');
        return view('simcards-asignada.create', compact('simcardsAsignada','simcards','puntoventa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id_simcard' => 'required|unique:simcards_asignadas',
            'id_puntoVenta' => 'required',
        ];
        $messages = [
            // 'id_simcard.required' => '',
            'id_simcard.unique' =>'La simcard ya se encuentra registrada en un punto',
        ];
        $this->validate($request, $rules, $messages);


        request()->validate(SimcardsAsignada::$rules);
        $SimcardsAsignada = new SimcardsAsignada;
        $idu = Auth::id();
        $SimcardsAsignada->id_userCreador=$idu;
        $SimcardsAsignada->fechaRegistro=now();
        $SimcardsAsignada->observaciones=$request->input('observaciones');
        $SimcardsAsignada->id_puntoVenta=$request->input('id_puntoVenta');
        $id_simcard=$request->input('id_simcard');
        $SimcardsAsignada->id_simcard=$id_simcard;
        $SimcardsAsignada->estado='Activa';

        $SimcardsAsignada->save();

        $SimcardsAsignadasRegistrada = new SimcardsAsignadasRegistrada;
        $idu = Auth::id();
        $SimcardsAsignadasRegistrada->id_userCreador=$idu;
        $SimcardsAsignadasRegistrada->fechaRegistro=now();
        $SimcardsAsignadasRegistrada->observaciones=$request->input('observaciones');
        $SimcardsAsignadasRegistrada->id_puntoVenta=$request->input('id_puntoVenta');
        $id_simcard=$request->input('id_simcard');
        $SimcardsAsignadasRegistrada->id_simcard=$id_simcard;
        $SimcardsAsignadasRegistrada->estado='Activa';

        $SimcardsAsignadasRegistrada->save();

        $simcard=Simcard::findOrFail($id_simcard);
        $idu = Auth::id();
        $simcard->id_userCreador=$idu;
        $simcard->estado='Activa';
        $simcard->save();

        return redirect()->route('simcards-asignadas.index')
            ->with('success', 'SimcardsAsignada creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $simcardsAsignada = SimcardsAsignada::find($id);

        return view('simcards-asignada.show', compact('simcardsAsignada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $simcardsAsignada = SimcardsAsignada::find($id);
        $idu = Auth::id();
        $selesion = DB::table('simcards')
        ->select('id','linea')
        ->where('simcards.estado','Inactiva')
        ->where('id_userAsignado',$idu)
        ->orderBy('id','asc')
        ->paginate(100000000000000);
        $simcards = $selesion->pluck('linea','id');
        $puntoventa=PuntoVenta::pluck('nombrePdv','id');

        return view('simcards-asignada.edit', compact('simcardsAsignada','simcards','puntoventa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SimcardsAsignada $simcardsAsignada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimcardsAsignada $simcardsAsignada)
    {
        request()->validate(SimcardsAsignada::$rules);

        $simcardsAsignada->update($request->all());

        return redirect()->route('simcards-asignadas.index')
            ->with('success', 'SimcardsAsignada actualizada satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $simcardsAsignada = SimcardsAsignada::find($id)->delete();

        return redirect()->route('simcards-asignadas.index')
            ->with('success', 'SimcardsAsignada eliminada satisfactoriamente');
    }
    public function exportar()
    {
        // return (new SimcardsAsignadaExport)->download('simcardsRegistro.csv', \Maatwebsite\Excel\Excel::CSV);
        return Excel::download(new SimcardsAsignadaExport, 'simcardsRegistro.csv');
        return back()->with('success', 'Exportado satisfactoriamente');
    }


}

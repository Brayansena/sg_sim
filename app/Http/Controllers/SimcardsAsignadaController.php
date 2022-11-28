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

    public function asignarBodega(Request $request)
    {
        $texto=trim($request->get('texto'));
        $simcards = DB::table('simcards')
            ->join('users','simcards.id_userAsignado','=','users.id')
            ->select('simcards.id','simcards.linea','simcards.id_userAsignado','simcards.estado','users.name')
            ->where('estado','Inactiva')
            ->where('simcards.id_userAsignado',1)
            ->where('simcards.id','LIKE','%'.$texto.'%')
            ->orderBy('simcards.id','asc')
            ->paginate(100000000000000);
        return view('simcard.asignarbodega', compact('simcards','texto'));

    }

    public function asignadoBodega(Request $request)
    {
        $asignars = $request->asignando;
        $request->validate([
            'asignando' => 'required',
        ],
        [
            'asignando.required' => 'Selecione una Casilla'
        ]);
        foreach ($asignars as $asignar){
            Simcard::where('id',$asignar)->update(['id_userAsignado'=>3]);
        }
        // $id = Auth::id();
        // $idsimcard=$request->input($asignar);
        // $simcards=Simcard::findOrFail($idsimcard);
        // $simcards->estado=0;
        // $simcards->save();
        return back();
    }


    public function estado(Request $request)
    {
        $idu = Auth::id();
        $texto=trim($request->get('texto'));
        $simcards = DB::table('simcards')
            ->join('users','simcards.id_userAsignado','=','users.id')
            ->select('simcards.estado','simcards.id','simcards.linea','users.name')
            ->where('simcards.id_userAsignado','>',$idu)
            ->Where('simcards.linea','LIKE','%'.$texto.'%')
            ->Where('simcards.id','LIKE','%'.$texto.'%')
            ->paginate(100000000000000);


        return view('simcard.estadosim', compact('simcards','texto'));
    }

    public function estadobodega(Request $request)
    {
        $activars = $request->activado;
        $request->validate([
            'activado' => 'required',
        ],
        [
            'activado.required' => 'Selecione una Casilla'
        ]);


        foreach ($activars as $activar){
            $idu = Auth::id();
            Simcard::where('id',$activar)->update(['estado'=>'Inactiva','id_userAsignado'=>$idu]);
            SimcardsAsignada::where('estado','Activa')->where('id_simcard',$activar)->delete();
            SimcardsAsignadasRegistrada::where('estado','Activa')->where('id_simcard',$activar)->update(['estado'=>'Inactiva']);
        }
        return back();

    }
    public function intercambioindex(Request $request)
    {
        $id = Auth::id();
        $texto=trim($request->get('texto'));
        $simcardsAsignadas = DB::table('simcards_asignadas')
            ->join('users','simcards_asignadas.id_userCreador','=','users.id')
            ->join('simcards','simcards_asignadas.id_simcard','=','simcards.id')
            ->join('punto_ventas','simcards_asignadas.id_puntoVenta','=','punto_ventas.id')
            ->select('simcards_asignadas.id','simcards_asignadas.observaciones','simcards.linea','punto_ventas.nombrePdv','punto_ventas.conexion','users.name','simcards_asignadas.estado','simcards_asignadas.fechaRegistro','simcards_asignadas.id_simcard')
            // ->where('simcards_asignadas.id_userCreador','=',$id)
            ->orWhere('punto_ventas.nombrePdv','LIKE','%'.$texto.'%')
            ->orderBy('simcards_asignadas.estado','asc')
            ->paginate(100000000000000);

            $contadors = DB::table('simcards_asignadas')
            ->select('simcards_asignadas.estado')
            ->where('simcards_asignadas.estado','Activa')
            ->get();

        return view('simcard.intercambioindex', compact('simcardsAsignadas','texto','contadors'))
            ->with('i', (request()->input('page', 1) - 1) * $simcardsAsignadas->perPage());
    }
    public function intercambioedit(Request $request,$id)
    {

        $simcardsAsignada = SimcardsAsignada::find($id);
        $idu = Auth::id();
        $selesion = DB::table('simcards')
        ->select('id','linea','id_userAsignado')
        ->where('simcards.estado','Inactiva')
        ->where('id_userAsignado',$idu)
        ->orderBy('id','asc')
        ->paginate(100000000000000);
        $simcards = $selesion->pluck('id','id');




        return view('simcard.intercambioedit', compact('simcardsAsignada','simcards'));

    }

    public function intercambioupdate(Request $request,$id)
    {
        request()->validate(IntercambiosSim::$rules);

        $simcardsAsignada = SimcardsAsignada::find($id);
        $simcard = Simcard::find($id);
        $idu = Auth::id();
        $intercambio = new IntercambiosSim();
        $intercambio->id_oldSimcard=$simcardsAsignada->id_simcard;





        $intercambio->id_puntoVenta=$simcardsAsignada->id_puntoVenta;
        $intercambio->id_userCreador=$idu;
        $intercambio->id_newSimcard=$request->input('id_newSimcard');
        $intercambio->save();
        $idu = Auth::id();



        $SimcardsAsignadasRegistrada = new SimcardsAsignadasRegistrada;
        $SimcardsAsignadasRegistrada->id_userCreador=$idu;
        $SimcardsAsignadasRegistrada->fechaRegistro=now();
        $SimcardsAsignadasRegistrada->observaciones=$simcardsAsignada->observaciones;
        $SimcardsAsignadasRegistrada->id_puntoVenta=$simcardsAsignada->id_puntoVenta;
        $SimcardsAsignadasRegistrada->id_simcard=$request->input('id_newSimcard');
        $SimcardsAsignadasRegistrada->estado='Activa';
        $SimcardsAsignadasRegistrada->save();


        Simcard::where('id',$intercambio->id_oldSimcard)->update(['estado'=>'Inactiva','id_userAsignado'=>$idu]);
        Simcard::where('id',$intercambio->id_newSimcard)->update(['estado'=>'Activa','id_userAsignado'=>$idu]);


        SimcardsAsignada::where('id_simcard',$intercambio->id_oldSimcard)->delete();
        SimcardsAsignadasRegistrada::where('estado','Activa')->where('id_simcard',$intercambio->id_oldSimcard)->update(['estado'=>'Inactiva']);

        $SimcardsAsignadanew = new SimcardsAsignada;
        $SimcardsAsignadanew->id_userCreador=$idu;
        $SimcardsAsignadanew->fechaRegistro=now();
        $SimcardsAsignadanew->id_puntoVenta=$simcardsAsignada->id_puntoVenta;
        $SimcardsAsignadanew->id_simcard=$intercambio->id_newSimcard;
        $SimcardsAsignadanew->estado='Activa';

        $SimcardsAsignadanew->save();




        return redirect()->route('simcard.intercambioindex')
            ->with('success', 'SimcardsAsignada actualizada satisfactoriamente');

    }


}

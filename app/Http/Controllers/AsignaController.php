<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IntercambiosSim;
use App\Models\Simcard;
use App\Models\SimcardsAsignada;
use App\Models\SimcardsAsignadasRegistrada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AsignaController extends Controller
{
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
        return view('asignacion.asignarbodega', compact('simcards','texto'));

    }

    public function asignadoBodega(Request $request)
    {
        $asignars = $request->asignando;

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
        $texto=trim($request->get('texto'));
        $simcards = DB::table('simcards')
            ->join('users','simcards.id_userAsignado','=','users.id')
            ->select('simcards.estado','simcards.id','simcards.linea','users.name')
            ->where('simcards.id_userAsignado','>=',4)
            ->Where('simcards.linea','LIKE','%'.$texto.'%')
            ->Where('simcards.id','LIKE','%'.$texto.'%')
            ->paginate(100000000000000);


        return view('asignacion.estadosim', compact('simcards','texto'));
    }

    public function estadobodega(Request $request)
    {
        $activars = $request->activado;



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

        return view('intercambio.index', compact('simcardsAsignadas','texto','contadors'))
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




        return view('intercambio.edit', compact('simcardsAsignada','simcards'));

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




        return redirect()->route('intercambio.index')
            ->with('success', 'SimcardsAsignada actualizada satisfactoriamente');

    }
}

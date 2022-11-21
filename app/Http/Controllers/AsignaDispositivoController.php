<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IntercambiosSim;
use App\Models\Estado;
use App\Models\TipoDispositivo;
use App\Models\Simcard;
use App\Models\SimcardsAsignada;
use App\Models\Dispositivo;
use App\Models\DispositivoAsignado;
use App\Models\SimcardsAsignadasRegistrada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AsignaDispositivoController extends Controller
{
    public function asignarDispositivo(Request $request)
    {
        $texto=trim($request->get('texto'));
        $dispositivos = DB::table('dispositivos')
            ->join('users','dispositivos.id_userAsignado','=','users.id')
            ->join('punto_ventas','dispositivos.id_puntoVenta','=','punto_ventas.id')
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.modelo','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.observacion','users.name','dispositivos.numeroActa','dispositivos.updated_at','dispositivos.procesador','dispositivos.ram','dispositivos.discoDuro','dispositivos.cantidad','dispositivos.id_userCreador')
            // ->orWhere('dispositivos.id_puntoVenta','LIKE','%'.$texto.'%')
            ->orWhere('dispositivos.id','LIKE','%'.$texto.'%')
            ->where('dispositivos.estado','Asignado')
            ->orderBy('dispositivos.id','asc')
            ->paginate(100000000000);
        return view('dispositivo.reasignar', compact('dispositivos','texto'));

    }

    public function asignadoDispositivo(Request $request)
    {
        $idu = Auth::id();
        $request->validate([
            'reasignar' => 'required',
        ],
        [
            'reasignar.required' => 'Selecione una Casilla'
        ]);
        $reasignars = $request->reasignar;
        foreach ($reasignars as $reasignar){
            Dispositivo::where('id',$reasignar)->update(['id_userAsignado'=>3,'id_puntoVenta'=>1,'estado'=>'Disponible','id_userCreador'=>$idu]);
        }
        return back();
    }

    public function estado(Request $request)
    {
        $texto=trim($request->get('texto'));
        $dispositivos = DB::table('dispositivos')
            ->join('users','dispositivos.id_userAsignado','=','users.id')
            ->join('punto_ventas','dispositivos.id_puntoVenta','=','punto_ventas.id')
            ->select('dispositivos.id_puntoVenta','dispositivos.estado','punto_ventas.nombrePdv','dispositivos.tipoDispositivo','dispositivos.id','dispositivos.modelo','dispositivos.serial','dispositivos.mac','dispositivos.imei','dispositivos.observacion','users.name','dispositivos.numeroActa','dispositivos.updated_at','dispositivos.procesador','dispositivos.ram','dispositivos.discoDuro','dispositivos.cantidad','dispositivos.id_userCreador')
            ->where('dispositivos.estado','!=','Asignado')
            ->where('dispositivos.id','LIKE','%'.$texto.'%')
            ->orderBy('dispositivos.id','asc')
            ->paginate(100000000000);
        return view('dispositivo.estado', compact('dispositivos','texto'));

    }
    public function tecnico(Request $request)
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
        return view('dispositivo.tecnico', compact('estado','dispositivoss','dispositivo','tipoDispositivo','estado'));

    }

    public function tecnicoasignado(Request $request)
    {

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


        return redirect()->route('dispositivos.tecnico')
        ->with('success', 'Dispositivo Asignado Satisfactoriamente');
    }

}

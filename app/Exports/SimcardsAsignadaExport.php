<?php

namespace App\Exports;

use App\Models\simcardsAsignada;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SimcardsAsignadaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return simcardsAsignada::all();

        $simcardsAsignadas = DB::table('simcards_asignadas')
            ->join('simcards','simcards_asignadas.id_simcard','=','simcards.id')
            ->join('punto_ventas','simcards_asignadas.id_puntoVenta','=','punto_ventas.id')
            ->join('users','simcards.id_userCreador','=','users.id')
            ->where('simcards_asignadas.estado','=','Activa')
            ->select('simcards.linea','simcards.id','simcards.clave','simcards.usuario','simcards.fechaCorte','simcards.planAsignado','simcards.apn','simcards_asignadas.id_puntoVenta','punto_ventas.nombrePdv','punto_ventas.lider','users.name','simcards.updated_at')
            ->orderBy('simcards.linea','desc')->get();
            return $simcardsAsignadas;
    }
    public function headings(): array
    {
        return [
            'LINEA','SIM CARD','CLAVE','USUARIO','FECHA DE CORTE','PLAN ASIGNADO','APN','COD PDV','NOMBRE PDV ','LIDER','MODIFICADO POR','ULTIMA MODIFICACION'
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Dispositivo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class DispositivoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dispositivos = DB::table('dispositivos')
            ->join('users','dispositivos.id_userCreador','=','users.id')
            ->join('punto_ventas','dispositivos.id_puntoVenta','=','punto_ventas.id')
            ->select('dispositivos.modelo','dispositivos.id','dispositivos.serial','dispositivos.tipoDispositivo','dispositivos.id_puntoVenta','punto_ventas.nombrePDv','dispositivos.numeroActa','dispositivos.estado','dispositivos.mac','dispositivos.imei','dispositivos.observacion','dispositivos.updated_at')
            ->get();
            return $dispositivos;
    }
    public function headings(): array
    {
        return [
            'MODELO','ACTIVO','SERIAL','TIPO DISPOSITIVO','COD PDV','NOMBRE PDV','NUMERO ACTA','ESTADO','MAC','IMEI','OBSERVACION','ULTIMA MODIFICACION'
        ];
    }
}

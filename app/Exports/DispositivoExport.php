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
            ->select('dispositivos.marca','dispositivos.descripcion','dispositivos.id','dispositivos.serial','dispositivos.tipoDispositivo','dispositivos.fechaAsignacion','dispositivos.id_puntoVenta','punto_ventas.nombrePDv','dispositivos.cedulaResponsable','dispositivos.responsable','dispositivos.numeroActa','dispositivos.estado','dispositivos.mac','dispositivos.imei','dispositivos.capacidad','dispositivos.observacion','dispositivos.updated_at')
            ->get();
            return $dispositivos;
    }
    public function headings(): array
    {
        return [
            'MARCA','DESCRIPCION','ACTIVO','SERIAL','TIPO DISPOSITIVO','FECHA ASIGNACION','COD PDV','NOMBRE PDV','CC RESPONSABLE','RESPONSABLE','NUMERO ACTA','ESTADO','MAC','IMEI','CAPACIDAD','OBSERVACION','ULTIMA MODIFICACION'
        ];
    }
}

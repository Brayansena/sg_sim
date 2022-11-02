<?php

namespace App\Exports;

use App\Models\PuntoVenta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PuntoVentaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PuntoVenta::all();
    }
    public function headings(): array
    {
        return [
            'id','NOMBRE TERMINAL','DIRECCION','MUNICIPIO','ZONA','CANAL','CONEXION','JEFE COMERCIAL','CC COORDINADOR','COORDINADOR','CC LIDER','LIDER','id_userCreador','Creado','Actualizado'
        ];
    }
}

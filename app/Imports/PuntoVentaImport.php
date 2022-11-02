<?php

namespace App\Imports;

use App\Models\PuntoVenta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PuntoVentaImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PuntoVenta([
            'id'=>$row['cod_pdv'],
            'nombrePdv'=>$row['nombre_terminal'],
            'direccion'=>$row['direccion'],
            'municipio'=>$row['municipio'],
            'canal'=>$row['canal'],
            'conexion'=>$row['conexion'],
            'zona'=>$row['zona'],
            'jefeComercial'=>$row['jefe_comercial'],
            'ccCordinador'=>$row['cc_coordinador'],
            'cordinador'=>$row['coordinador'],
            'ccLider'=>$row['cc_lider'],
            'lider'=>$row['lider'],
        ]);
    }
    public function uniqueBy()
    {
        return 'id';
    }
}

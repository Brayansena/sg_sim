<?php

namespace App\Imports;

use App\Models\Simcard;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class SimcardImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Simcard([
            'id'=>$row['sims'],
            'linea'=>$row['lineas'],
            'apn'=>$row['apn'],
            'usuario'=>$row['usuario'],
            'clave'=>$row['clave'],
            'planAsignado'=>$row['plan'],
            'fechaCorte'=>$row['fecha_de_corte'],
            'operador'=>$row['operador'],
        ]);
    }
    public function uniqueBy()
    {
        return 'id';
    }
}

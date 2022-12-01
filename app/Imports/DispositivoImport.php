<?php

namespace App\Imports;

use App\Models\Dispositivo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class DispositivoImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dispositivo([
            'tipoDispositivo'=>$row['tipo_dispositivo'],
            'id'=>$row['activo'],
            'serial'=>$row['serial'],
            'modelo'=>$row['modelo'],
            'id_puntoVenta'=>$row['cod_pdv'],
            'estado'=>$row['estado'],
            'numeroActa'=>$row['numero_acta'],
            'procesador'=>$row['procesador'],
            'ram'=>$row['ram'],
            'discoDuro'=>$row['disco_duro'],
            'mac'=>$row['mac'],
            'imei'=>$row['imei'],
            'observacion'=>$row['observacion'],
            'cantidad'=>$row['cantidad'],
        ]);
    }
    public function uniqueBy()
    {
        return 'id';
    }
}

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
            'modelo'=>$row['modelo'],
            'id'=>$row['activo'],
            'tipoDispositivo'=>$row['tipo_dispositivo'],
            'serial'=>$row['serial'],
            'id_puntoVenta'=>$row['cod_pdv'],
            'nombrePDv'=>$row['nombre_pdv'],
            'numeroActa'=>$row['numero_acta'],
            'estado'=>$row['estado'],
            'mac'=>$row['mac'],
            'imei'=>$row['imei'],
            'observacion'=>$row['observacion'],
        ]);
    }
    public function uniqueBy()
    {
        return 'id';
    }
}

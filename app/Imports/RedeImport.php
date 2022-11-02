<?php

namespace App\Imports;

use App\Models\Rede;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class RedeImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rede([
            'id'=>$row['id'],
            'id_puntoVenta'=>$row['id_puntoventa'],
            'nombreNodo'=>$row['nombrenodo'],
            'ip_radio'=>$row['ip_radio'],
            'ip_redlan'=>$row['ip_redlan'],
            'ip_equipo'=>$row['ip_equipo'],
        ]);
    }
    public function uniqueBy()
    {
        return 'id';
    }
}

<?php

namespace App\Imports;

use App\Models\Consumo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ConsumoImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Consumo([
            'id'=>$row['id'],
            'id_simcards'=>$row['id_simcards'],
            'consumo1'=>$row['consumo1'],
            'consumo2'=>$row['consumo2'],
            'consumo3'=>$row['consumo3'],
        ]);
    }
    public function uniqueBy()
    {
        return 'id';
    }
}

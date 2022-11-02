<?php

namespace App\Exports;

use App\Models\Consumo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConsumoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Consumo::all();
    }
    public function headings(): array
    {
        return [
            'id','id_simcards','consumo1','consumo2','consumo3','Creado','Actualizado'
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Rede;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RedeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rede::all();
    }
    public function headings(): array
    {
        return [
            'id','id_puntoVenta','nombreNodo','ip_radio','ip_redlan','ip_equipo','Creado','Actualizado'
        ];
    }
}

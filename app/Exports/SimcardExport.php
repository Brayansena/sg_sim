<?php

namespace App\Exports;

use App\Models\Simcard;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SimcardExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Simcard::all();
    }
    public function headings(): array
    {
        return [
            'id','linea','apn','usuario','clave','planAsignado','fechaCorte','estado','id_userAsignado','operador','id_userCreador','Creado','Actualizado'
        ];
    }
}

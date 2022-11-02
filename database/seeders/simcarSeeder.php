<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Zona;
use App\Models\Lidere;
use App\Models\Regionale;
use App\Models\Municipio;
use App\Models\Operadore;
use App\Models\Canale;
use App\Models\Conexione;
use App\Models\Cordinadore;
use App\Models\JefeComerciale;
use App\Models\Simcard;
use App\Models\PuntoVenta;

class simcarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(9)->create();
        // Lidere::factory(9)->create();
        // Cordinadore::factory(9)->create();
        // JefeComerciale::factory(9)->create();
        // Municipio::factory(9)->create();



        Simcard::create([
            'linea' => '123',
            'apn' => '12312313123',
            'usuario' => 'braydus',
            'clave' => '213',
            'planAsignado' => 'baysdbiua',
            'fechaCorte' => '12',
            'id_userAsignado' => '1',
            'operador' => 'claro',
            'id_userCreador' => '1',
        ]);

        Simcard::create([
            'linea' => '3123',
            'apn' => '12312313123',
            'usuario' => 'braydus',
            'clave' => '213',
            'planAsignado' => 'baysdbiua',
            'fechaCorte' => '12',
            'id_userAsignado' => '1',
            'operador' => 'movistar',
            'id_userCreador' => '1',
        ]);

        // PuntoVenta::create([
        //     'nombrePdv' => 'Bodega',
        //     'direccion' => 'Bodega',
        //     'id_zona' => '1',
        //     'id_municipio' => '1',
        //     'id_canal' => '1',
        //     'id_conexion' => '1',
        //     'id_cordinador' => '1',
        //     'id_jefeComercial' => '1',
        //     'id_lider' => '1',
        // ]);



    }
}

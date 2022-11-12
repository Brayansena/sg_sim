<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Estado;
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
use App\Models\Dispositivo;
use App\Models\TipoDispositivo;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'administrador',
            'password' => bcrypt('12345678')
        ])->assignRole('admin');

        User::create([
            'name' => 'Inventario',
            'email' => 'inventario',
            'password' => bcrypt('12345678')
        ])->assignRole('inventario');

        User::create([
            'name' => 'Bodega',
            'email' => 'bodega',
            'password' => bcrypt('12345678')
        ])->assignRole('bodega');

        PuntoVenta::create([
            'id' => '1',
            'nombrePdv' => 'BODEGA',
            'direccion' => 'Oficina Principal',
            'municipio' => 'POPAYAN',
            'zona' => 'PRINCIPAL',
            'canal' => 'NINGUNO',
            'conexion' => 'INTERNET PRIVADO',
            'jefeComercial' => 'NINGUNO',
            'ccCordinador' => 'NINGUNO',
            'cordinador' => 'NINGUNO',
            'ccLider' => 'NINGUNO',
            'lider' => 'NINGUNO',
        ]);
        // User::create([
        //     'name' => 'Tecnico',
        //     'email' => 'tecnico',
        //     'password' => bcrypt('12345678')
        // ])->assignRole('tecnico');



        Zona::create([
            'zona' => 'CENTRO',
        ]);
        Zona::create([
            'zona' => 'COSTA',
        ]);
        Zona::create([
            'zona' => 'OCCIDENTE 1',
        ]);
        Zona::create([
            'zona' => 'OCCIDENTE 2',
        ]);
        Zona::create([
            'zona' => 'SIERRA',
        ]);
        Zona::create([
            'zona' => 'MACIZO',
        ]);
        Zona::create([
            'zona' => 'BOTA CAUCANA',
        ]);
        Zona::create([
            'zona' => 'SUR 1',
        ]);
        Zona::create([
            'zona' => 'SUR 2',
        ]);
        Zona::create([
            'zona' => 'SUR 3',
        ]);
        Zona::create([
            'zona' => 'SUR 4',
        ]);
        Zona::create([
            'zona' => 'SUR 5',
        ]);
        Zona::create([
            'zona' => 'NORTE 1',
        ]);
        Zona::create([
            'zona' => 'NORTE 2',
        ]);
        Zona::create([
            'zona' => 'NORTE 3',
        ]);
        Zona::create([
            'zona' => 'ORIENTE 1',
        ]);
        Zona::create([
            'zona' => 'ORIENTE 2',
        ]);
        Zona::create([
            'zona' => 'ZONA 1',
        ]);
        Zona::create([
            'zona' => 'ZONA 2A',
        ]);
        Zona::create([
            'zona' => 'ZONA 2B',
        ]);
        Zona::create([
            'zona' => 'ZONA 2C',
        ]);
        Zona::create([
            'zona' => 'ZONA 3A',
        ]);
        Zona::create([
            'zona' => 'ZONA 3B',
        ]);
        Zona::create([
            'zona' => 'ZONA 4',
        ]);
        Zona::create([
            'zona' => 'ZONA 5',
        ]);
        Zona::create([
            'zona' => 'ZONA 6',
        ]);
        Zona::create([
            'zona' => 'ZONA 7',
        ]);
        Zona::create([
            'zona' => 'ZONA 8',
        ]);
        Zona::create([
            'zona' => 'ZONA 9',
        ]);







        Regionale::create([
            'regional' => 'CENTRO',
        ]);
        Regionale::create([
            'regional' => 'MACIZO',
        ]);
        Regionale::create([
            'regional' => 'SUR',
        ]);
        Regionale::create([
            'regional' => 'NORTE',
        ]);
        Regionale::create([
            'regional' => 'POPAYAN NORTE',
        ]);
        Regionale::create([
            'regional' => 'POPAYAN SUR',
        ]);





        Municipio::create([
            'municipio' => 'ALMAGUER',
        ]);
        Municipio::create([
            'municipio' => 'ARGELIA',
        ]);
        Municipio::create([
            'municipio' => 'BALBOA',
        ]);
        Municipio::create([
            'municipio' => 'BOLIVAR',
        ]);
        Municipio::create([
            'municipio' => 'CAJIBIO',
        ]);
        Municipio::create([
            'municipio' => 'EL TAMBO',
        ]);
        Municipio::create([
            'municipio' => 'FLORENCIA',
        ]);
        Municipio::create([
            'municipio' => 'GUAPI',
        ]);
        Municipio::create([
            'municipio' => 'INZA',
        ]);
        Municipio::create([
            'municipio' => 'LA SIERRA',
        ]);
        Municipio::create([
            'municipio' => 'LA VEGA',
        ]);
        Municipio::create([
            'municipio' => 'MERCADERES',
        ]);
        Municipio::create([
            'municipio' => 'MORALES',
        ]);
        Municipio::create([
            'municipio' => 'PAEZ',
        ]);
        Municipio::create([
            'municipio' => 'PATIA',
        ]);
        Municipio::create([
            'municipio' => 'PIAMONTE',
        ]);
        Municipio::create([
            'municipio' => 'PIENDAMO',
        ]);
        Municipio::create([
            'municipio' => 'POPAYAN',
        ]);
        Municipio::create([
            'municipio' => 'PURACE',
        ]);
        Municipio::create([
            'municipio' => 'ROSAS',
        ]);
        Municipio::create([
            'municipio' => 'SAN SEBASTIAN',
        ]);
        Municipio::create([
            'municipio' => 'SANTA ROSA',
        ]);
        Municipio::create([
            'municipio' => 'SILVIA',
        ]);
        Municipio::create([
            'municipio' => 'SOTARA',
        ]);
        Municipio::create([
            'municipio' => 'SUCRE',
        ]);
        Municipio::create([
            'municipio' => 'TIMBIO',
        ]);
        Municipio::create([
            'municipio' => 'TIMBIQUI',
        ]);
        Municipio::create([
            'municipio' => 'TOTORO',
        ]);



        Canale::create([
            'canal' => 'AMB',
        ]);
        Canale::create([
            'canal' => 'CDA',
        ]);
        Canale::create([
            'canal' => 'CM',
        ]);
        Canale::create([
            'canal' => 'CRR',
        ]);
        Canale::create([
            'canal' => 'EQUIPO COMERCIAL',
        ]);
        Canale::create([
            'canal' => 'PDV',
        ]);
        Canale::create([
            'canal' => 'SERVITECA',
        ]);
        Canale::create([
            'canal' => 'TAT',
        ]);
        Canale::create([
            'canal' => 'VIRTUAL',
        ]);






        Conexione::create([
            'conexion' => 'GPRS',
        ]);
        Conexione::create([
            'conexion' => 'GPRS-ZTE',
        ]);
        Conexione::create([
            'conexion' => 'GPRS-MIKROTIK',
        ]);
        Conexione::create([
            'conexion' => 'GPRS-PDA',
        ]);
        Conexione::create([
            'conexion' => 'INTERNET OPERADOR',
        ]);
        Conexione::create([
            'conexion' => 'INTERNET RED PRIVADA',
        ]);
        Conexione::create([
            'conexion' => 'OVPN',
        ]);
        Conexione::create([
            'conexion' => 'PPTP',
        ]);
        Conexione::create([
            'conexion' => 'RED PRIVADA',
        ]);
        Conexione::create([
            'conexion' => 'REDCA',
        ]);
        Conexione::create([
            'conexion' => 'VPN/GPRS',
        ]);
        Conexione::create([
            'conexion' => 'VACIO',
        ]);

        Operadore::create([
            'operador' => 'movistar',
        ]);
        Operadore::create([
            'operador' => 'tigo',
        ]);
        Operadore::create([
            'operador' => 'claro',
        ]);



        TipoDispositivo::create([
            'dispositivo' => 'torre',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'teclado',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'mouse',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'monitor sin VGA',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'monitor VGA',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'todo en uno',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'pda',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'mini torre',
        ]);
        //2
        TipoDispositivo::create([
            'dispositivo' => 'portatil',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'sid',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'lector de barras',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'lectore biometrico',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'camaras logitech',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'impresora',
        ]);
        //2
        TipoDispositivo::create([
            'dispositivo' => 'escaner',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'base refrigerante',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'disco duro',
        ]);









        TipoDispositivo::create([
            'dispositivo' => 'haplite',
        ]);
        //2
        TipoDispositivo::create([
            'dispositivo' => 'antena',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'router',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'switches',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'antena directv',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'decodificador directv',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'control tv',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'control directv',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'telefono voip',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'ups',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'regulador',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'rag',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'camara ip',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'dvr',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'camara vigilancia',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'televisor',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'board alarma',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'bateria alarma',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'gprs alarma',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'teclado alarma',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'boton de panico',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'sensor',
        ]);



        TipoDispositivo::create([
            'dispositivo' => 'otro',
        ]);

        Estado::create([
            'estado' => 'Disponible',
        ]);
        Estado::create([
            'estado' => 'Asignado',
        ]);
        Estado::create([
            'estado' => 'Reparacion',
        ]);
        Estado::create([
            'estado' => 'Garantia',
        ]);
        Estado::create([
            'estado' => 'De Baja',
        ]);
        Estado::create([
            'estado' => 'Revision',
        ]);

    }
}

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

        User::create([
            'name' => 'brayan',
            'email' => '3113368727',
            'password' => bcrypt('12345678')
        ])->assignRole('tecnico');

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
            'dispositivo' => 'Torre',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Teclado',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Mouse',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Monitor HDMI',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Monitor VGA',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Todo en uno',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Pda',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Mini torre',
        ]);
        //2
        TipoDispositivo::create([
            'dispositivo' => 'Portatil',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Sid',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Lector de barras',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Lectore biometrico',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Camaras logitech',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Impresora',
        ]);
        //2
        TipoDispositivo::create([
            'dispositivo' => 'Escaner',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Base refrigerante',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Disco duro',
        ]);









        TipoDispositivo::create([
            'dispositivo' => 'Haplite',
        ]);
        //2
        TipoDispositivo::create([
            'dispositivo' => 'Antena',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Router',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Switches',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Antena directv',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Decodificador directv',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Control tv',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Control directv',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Telefono voip',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Ups',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Regulador',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Rag',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Camara ip',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Dvr',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Camara vigilancia',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Televisor',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Board alarma',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Bateria alarma',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Gprs alarma',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Teclado alarma',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Boton de panico',
        ]);
        TipoDispositivo::create([
            'dispositivo' => 'Sensor',
        ]);



        TipoDispositivo::create([
            'dispositivo' => 'Otro',
        ]);

        Estado::create([
            'estado' => 'Disponible',
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

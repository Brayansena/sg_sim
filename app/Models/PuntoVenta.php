<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PuntoVenta
 *
 * @property $id
 * @property $nombrePdv
 * @property $direccion
 * @property $municipio
 * @property $zona
 * @property $canal
 * @property $conexion
 * @property $jefeComercial
 * @property $ccCordinador
 * @property $cordinador
 * @property $ccLider
 * @property $lider
 * @property $id_userCreador
 * @property $created_at
 * @property $updated_at
 *
 * @property Dispositivo[] $dispositivos
 * @property DispositivoAsignado[] $dispositivoAsignados
 * @property Rede $rede
 * @property SimcardsAsignada[] $simcardsAsignadas
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PuntoVenta extends Model
{

    static $rules = [
        'id'=>'required',
		'nombrePdv' => 'required',
        'direccion' => 'required',
		'municipio' => 'required',
		'zona' => 'required',
        'conexion' => 'required',
		'canal' => 'required',
        'estado' => 'required',
		'jefeComercial' => 'required',
		'ccCordinador' => 'required',
		'cordinador' => 'required',
		'ccLider' => 'required',
		'lider' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombrePdv','direccion','municipio','zona','canal','conexion','jefeComercial','ccCordinador','cordinador','ccLider','lider','id_userCreador'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositivos()
    {
        return $this->hasMany('App\Models\Dispositivo', 'id_puntoVenta', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositivoAsignados()
    {
        return $this->hasMany('App\Models\DispositivoAsignado', 'id_puntoVenta', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rede()
    {
        return $this->hasOne('App\Models\Rede', 'id_puntoVenta', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function simcardsAsignadas()
    {
        return $this->hasMany('App\Models\SimcardsAsignada', 'id_puntoVenta', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_userCreador');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

}

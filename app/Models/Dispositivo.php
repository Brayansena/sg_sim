<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dispositivo
 *
 * @property $marca
 * @property $descripcion
 * @property $id
 * @property $tipoDispositivo
 * @property $serial
 * @property $id_puntoVenta
 * @property $estado
 * @property $cedulaResponsable
 * @property $responsable
 * @property $fechaAsignacion
 * @property $numeroActa
 * @property $mac
 * @property $imei
 * @property $capacidad
 * @property $observacion
 * @property $id_userCreador
 * @property $created_at
 * @property $updated_at
 *
 * @property DispositivoAsignado[] $dispositivoAsignados
 * @property PuntoVenta $puntoVenta
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dispositivo extends Model
{

    static $rules = [
		'marca' => 'required',
		'descripcion' => 'required',
		'tipoDispositivo' => 'required',
		'serial' => 'required',
		'id_puntoVenta' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','marca','descripcion','tipoDispositivo','serial','id_puntoVenta','estado','cedulaResponsable','responsable','fechaAsignacion','numeroActa','mac','imei','capacidad','observacion','id_userCreador'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositivoAsignados()
    {
        return $this->hasMany('App\Models\DispositivoAsignado', 'id_dispositivo', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function puntoVenta()
    {
        return $this->hasOne('App\Models\PuntoVenta', 'id', 'id_puntoVenta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_userCreador');
    }


}

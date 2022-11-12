<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dispositivo
 *
 * @property $id
 * @property $tipoDispositivo
 * @property $serial
 * @property $id_puntoVenta
 * @property $estado
 * @property $numeroActa
 * @property $mac
 * @property $imei
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
        'id' => 'required',
        'estado' => 'required',
		'tipoDispositivo' => 'required',
		'id_puntoVenta' => 'required',
        'id_userAsignado' => 'required',
        'numeroActa' => 'required',
    ];
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','modelo','tipoDispositivo','serial','id_puntoVenta','estado','id_userAsignado','numeroActa','mac','imei','observacion','id_userCreador','procesador','ram','discoDuro','cantidad'];


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

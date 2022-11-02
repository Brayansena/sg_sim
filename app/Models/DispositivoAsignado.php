<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DispositivoAsignado
 *
 * @property $id
 * @property $id_dispositivo
 * @property $id_puntoVenta
 * @property $id_userCreador
 * @property $estado
 * @property $nombreResponsable
 * @property $cedulaResponsable
 * @property $created_at
 * @property $updated_at
 *
 * @property Dispositivo $dispositivo
 * @property PuntoVenta $puntoVenta
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DispositivoAsignado extends Model
{

    static $rules = [
		'id_dispositivo' => 'required',
		'id_puntoVenta' => 'required',
		'nombreResponsable' => 'required',
		'cedulaResponsable' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_dispositivo','id_puntoVenta','id_userCreador','estado','nombreResponsable','cedulaResponsable'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dispositivo()
    {
        return $this->hasOne('App\Models\Dispositivo', 'id', 'id_dispositivo');
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

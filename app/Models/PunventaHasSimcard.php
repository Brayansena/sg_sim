<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PunventaHasSimcard
 *
 * @property $id
 * @property $fecha_asig
 * @property $simcard_activa
 * @property $id_userCreador
 * @property $id_punto_venta
 * @property $id_user
 * @property $created_at
 * @property $updated_at
 *
 * @property PuntoVenta $puntoVenta
 * @property Simcard $simcard
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PunventaHasSimcard extends Model
{

    static $rules = [
		'fecha_asig' => 'required',
		'simcard_activa' => 'required',
		'id_userCreador' => 'required',
		'id_punto_venta' => 'required',
		'id_user' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_asig','simcard_activa','id_userCreador','id_punto_venta','id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function puntoVenta()
    {
        return $this->hasOne('App\Models\PuntoVenta', 'id', 'id_punto_venta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function simcard()
    {
        return $this->hasOne('App\Models\Simcard', 'id', 'id_userCreador');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }


}

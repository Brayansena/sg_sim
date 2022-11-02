<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SimcardsAsignadasRegistrada
 *
 * @property $id
 * @property $observaciones
 * @property $id_simcard
 * @property $id_puntoVenta
 * @property $id_userCreador
 * @property $estado
 * @property $fechaRegistro
 * @property $created_at
 * @property $updated_at
 *
 * @property PuntoVenta $puntoVenta
 * @property Simcard $simcard
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SimcardsAsignadasRegistrada extends Model
{

    static $rules = [
		'id_simcard' => 'required',
		'id_puntoVenta' => 'required',
    ];

    protected $perPage = 1000000000000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['observaciones','id_simcard','id_puntoVenta','id_userCreador','estado','fechaRegistro'];


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
    public function simcard()
    {
        return $this->hasOne('App\Models\Simcard', 'id', 'id_simcard');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_userCreador');
    }


}

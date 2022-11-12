<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Simcard
 *
 * @property $id
 * @property $linea
 * @property $apn
 * @property $usuario
 * @property $clave
 * @property $planAsignado
 * @property $fechaCorte
 * @property $estado
 * @property $id_userAsignado
 * @property $operador
 * @property $id_userCreador
 * @property $created_at
 * @property $updated_at
 *
 * @property Consumo[] $consumos
 * @property SimcardsAsignada[] $simcardsAsignadas
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Simcard extends Model
{

    static $rules = [
        // 'id' => 'required',
		// 'linea' => 'required',
        // 'apn' => 'required',
		// 'usuario' => 'required',
		// 'clave' => 'required',
		// 'planAsignado' => 'required',
		// 'fechaCorte' => 'required',
		// 'id_userCreador' => 'required',
		// 'operador' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','linea','apn','usuario','clave','planAsignado','fechaCorte','estado','id_userAsignado','operador','id_userCreador'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consumos()
    {
        return $this->hasMany('App\Models\Consumo', 'id_simcards', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function simcardsAsignadas()
    {
        return $this->hasMany('App\Models\SimcardsAsignada', 'id_simcard', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_userCreador');
    }


}

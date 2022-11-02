<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rede
 *
 * @property $id
 * @property $id_puntoVenta
 * @property $nombreNodo
 * @property $ip_radio
 * @property $ip_redlan
 * @property $ip_equipo
 * @property $created_at
 * @property $updated_at
 *
 * @property PuntoVenta $puntoVenta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rede extends Model
{

    static $rules = [
		'id_puntoVenta' => 'required',
		'nombreNodo' => 'required',
		'ip_radio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_puntoVenta','nombreNodo','ip_radio','ip_redlan','ip_equipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function puntoVenta()
    {
        return $this->hasOne('App\Models\PuntoVenta', 'id', 'id_puntoVenta');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Conexione
 *
 * @property $id
 * @property $conexion
 * @property $created_at
 * @property $updated_at
 *
 * @property PuntoVenta[] $puntoVentas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Conexione extends Model
{
    use HasFactory;

    static $rules = [
		'conexion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['conexion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puntoVentas()
    {
        return $this->hasMany('App\Models\PuntoVenta', 'id_conexion', 'id');
    }


}

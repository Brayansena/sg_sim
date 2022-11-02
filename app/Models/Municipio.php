<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Municipio
 *
 * @property $id
 * @property $municipio
 * @property $created_at
 * @property $updated_at
 *
 * @property PuntoVenta[] $puntoVentas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipio extends Model
{
    use HasFactory;

    static $rules = [
		'municipio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['municipio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puntoVentas()
    {
        return $this->hasMany('App\Models\PuntoVenta', 'id_municipio', 'id');
    }


}

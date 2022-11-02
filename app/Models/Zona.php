<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Zona
 *
 * @property $id
 * @property $zona
 * @property $created_at
 * @property $updated_at
 *
 * @property PuntoVenta[] $puntoVentas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Zona extends Model
{
    use HasFactory;

    static $rules = [
		'zona' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['zona'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puntoVentas()
    {
        return $this->hasMany('App\Models\PuntoVenta', 'id_zona', 'id');
    }


}

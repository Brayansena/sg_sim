<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Canale
 *
 * @property $id
 * @property $canal
 * @property $created_at
 * @property $updated_at
 *
 * @property PuntoVenta[] $puntoVentas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Canale extends Model
{
    use HasFactory;

    static $rules = [
		'canal' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['canal'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puntoVentas()
    {
        return $this->hasMany('App\Models\PuntoVenta', 'id_canal', 'id');
    }


}

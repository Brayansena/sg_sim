<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDispositivo
 *
 * @property $id
 * @property $dispositivo
 * @property $created_at
 * @property $updated_at
 *
 * @property Dispositivo[] $dispositivos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoDispositivo extends Model
{

    static $rules = [
		'dispositivo' => 'required',
    ];

    protected $perPage = 10000000000000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dispositivo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositivos()
    {
        return $this->hasMany('App\Models\Dispositivo', 'id_tipoDispositivo', 'id');
    }


}

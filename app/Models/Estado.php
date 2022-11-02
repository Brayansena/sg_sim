<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 *
 * @property $id
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Dispositivo[] $dispositivos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estado extends Model
{
    
    static $rules = [
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositivos()
    {
        return $this->hasMany('App\Models\Dispositivo', 'id_estado', 'id');
    }
    

}

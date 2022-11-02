<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Consumo
 *
 * @property $id
 * @property $id_simcards
 * @property $consumo1
 * @property $consumo2
 * @property $consumo3
 * @property $id_userCreador
 * @property $created_at
 * @property $updated_at
 *
 * @property Simcard $simcard
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consumo extends Model
{

    static $rules = [
		'id_simcards' => 'required',
		'consumo1' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_simcards','consumo1','consumo2','consumo3','id_userCreador'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function simcard()
    {
        return $this->hasOne('App\Models\Simcard', 'id', 'id_simcards');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_userCreador');
    }


}

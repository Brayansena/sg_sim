<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Operadore
 *
 * @property $id
 * @property $operador
 * @property $created_at
 * @property $updated_at
 *
 * @property Simcard[] $simcards
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Operadore extends Model
{
    use HasFactory;

    static $rules = [
		'operador' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['operador'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function simcards()
    {
        return $this->hasMany('App\Models\Simcard', 'id_operador', 'id');
    }


}

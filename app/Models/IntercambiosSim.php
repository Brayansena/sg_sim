<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class IntercambiosSim extends Model
{

    static $rules = [
        'id_newSimcard' => 'required',
    ];

    protected $perPage = 1000000000000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_oldSimcard','id_puntoVenta','id_userCreador','id_newSimcard'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


    public function simcard()
    {
        return $this->hasOne('App\Models\Simcard', 'id', 'id_oldSimcard');
    }


    public function puntoVenta()
    {
        return $this->hasOne('App\Models\PuntoVenta', 'id', 'id_puntoVenta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_userCreador');
    }

    public function newsimcard()
    {
        return $this->hasOne('App\Models\Simcard', 'id', 'id_newSimcard');
    }


}

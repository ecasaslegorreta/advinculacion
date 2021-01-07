<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
    protected $fillable = [
        'name',
        'cargo',
        'calle',
        'colonia',
        'noInterior',
        'noExterior',
        'cp',
        'ciudad',
        'telefono',
        'celular',
        'email'
    ];
//           Relacion de uno a muchos un oficinas tiene muchos oficios(corresponce)
    public function correspondences(){
        return $this ->hasMany('App\Correspondence');
    }
}

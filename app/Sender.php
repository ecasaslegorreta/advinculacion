<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    //
    protected $fillable = [
        'name',
        'cargo',
        'area',
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
//           Relacion de uno a muchos un Remitente tiene muchos oficios(corresponce)
    public function correspondences(){
        return $this ->hasMany('App\Correspondence');
    }
//           Relacion de uno a muchos un Remitente tiene muchos oficios(corresponce)
    public function shifteds(){
        return $this ->hasMany('App\Shifted');
    }
    public function documents(){
        return $this ->hasMany('App\documents');
    }

}

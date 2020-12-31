<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $fillable = [
        'name', 'detail'
    ];
    //           Relacion de uno a muchos un Remitente tiene muchos oficios(corresponce)
    public function shifteds(){
        return $this ->hasMany('App\Shifted');
    }
}

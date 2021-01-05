<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shifted extends Model
{
    //
    protected $fillable = [
        'sender_id',
        'correspondence_id',
        'position_id',
        'fechaTurno',
        'bodyTurno',
        'observacion'
    ];

    public function sender(){
        return $this->belongsTo('App\Sender');
    }

    public function position(){
        return $this->belongsTo('App\Position');
    }
    //           Relacion de uno a muchos un Shifted-turando tiene muchos Turnos contestados(turando a)
    public function correspondence(){
        return $this ->belongsTo('App\Correspondence');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correspondence extends Model
{
    //

    protected $fillable = [
        'sender_id',
        'recibo_id',
        'noSiase',
        'noOficio',
        'fechaRecepcion',
        'body'
    ];

    public function sender(){
        return $this->belongsTo('App\Sender');
    }
    public function shifteds(){
        return $this->hasMany('App\Shifted');
    }
}

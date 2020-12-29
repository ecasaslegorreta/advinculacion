<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correspondence extends Model
{
    //

    protected $fillable = [
        'sender_id',
        'noSiase',
        'noOficio',
        'fechaRecepcion',
        'body'
    ];





    public function sender(){
        return $this->belongsTo('App\Sender');
    }
}

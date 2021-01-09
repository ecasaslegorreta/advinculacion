<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = [
        'noOficio',
        'fecha',        
        'sender_id',
        'office_id',

        'body',
    ];

    public function sender(){
        return $this->belongsTo('App\Sender');
    }

    public function office(){
        return $this->belongsTo('App\Office');
    }
}

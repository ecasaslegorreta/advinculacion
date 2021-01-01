<?php

use App\Correspondence;
use Illuminate\Database\Seeder;

class CorrespondenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $filas=file('oficios.txt'); 
        foreach($filas as $value){
            list($sender_id, $noSiase, $noOficio, $fechaRecepcion,$body) = explode(",", $value); 
                Correspondence::create([
                        'sender_id' => $sender_id,
                        'noSiase'=>$noSiase,
                        'noOficio' =>$noOficio,
                        'fechaRecepcion' =>$fechaRecepcion,
                        'body' => $body,
                        
                ]);
        }
    }
}

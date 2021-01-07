<?php

use App\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $filas=file('offices.txt'); 
        foreach($filas as $value){
            list($nombre, $cargo, $calle, $noInterior, $noExterior,$colonia,$cp,$ciudad,$telefono,$celular,$email) = explode(",", $value); 
                Office::create([
                        'name' => $nombre,
                        'cargo'=>$cargo,
                        'calle' =>$calle,
                        'noInterior' => $noInterior,
                        'noExterior' => $noExterior,
                        'colonia' =>$colonia,
                        'cp' =>$cp,
                        'ciudad' =>$ciudad,
                        'telefono' =>$telefono,
                        'celular' =>$celular,
                        'email' =>$email
                ]);
        }
    }
}

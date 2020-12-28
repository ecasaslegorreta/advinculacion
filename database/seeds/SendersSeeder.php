<?php

use App\Sender;
use Illuminate\Database\Seeder;

class SendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //
       // $fp = fopen("remitentes.txt", "r");
       // while (!feof($fp)){
       //   $linea = fgets($fp);
       // archivo txt 

    $filas=file('remitentes.txt'); 
    foreach($filas as $value){
        list($nombre, $cargo, $area, $calle, $noInterior, $noExterior,$colonia,$cp,$ciudad,$telefono,$celular,$email) = explode(",", $value); 
            Sender::create([
                    'name' => $nombre,
                    'cargo'=>$cargo,
                    'area' =>$area,
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

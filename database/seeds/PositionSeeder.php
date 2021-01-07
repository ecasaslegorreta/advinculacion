<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $filas=file('positions.txt'); 
        foreach($filas as $value){
            list($nombre) = explode(",", $value); 
                Position::create([
                        'name' => $nombre,
                ]);
        }
    }
}

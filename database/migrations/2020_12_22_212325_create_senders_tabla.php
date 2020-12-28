<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendersTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cargo');
            $table->string('area',20);
            $table->string('calle',50);
            $table->string('noInterior', 15);
            $table->string('noExterior',15);
            $table->string('colonia',50);
            $table->Integer('cp');
            $table->string('ciudad');

            $table->string('telefono',30);
            $table->string('celular',30);
            $table->string('email')->unique();
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senders');
    }
}

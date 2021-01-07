<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cargo');
            $table->string('calle',50)->nullable();
            $table->string('noInterior', 15)->nullable();
            $table->string('noExterior',15)->nullable();
            $table->string('colonia',50)->nullable();
            $table->Integer('cp')->nullable();
            $table->string('ciudad')->nullable();

            $table->string('telefono',30)->nullable();
            $table->string('celular',30)->nullable();
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
        Schema::dropIfExists('offices');
    }
}
